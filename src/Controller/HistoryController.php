<?php

namespace App\Controller;

use App\Entity\History;
use App\Form\HistoryType;
use App\Repository\HistoryRepository;
use App\Repository\PresidentRepository;
use App\Service\UtilsService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

/**
 * Class VerticalHistoryController
 * @package App\Controller
 * @Route("/asf/history/history")
 */
class HistoryController extends AbstractController
{
    /**
     * @param HistoryRepository $historyRepository
     * @param PresidentRepository $presidentRepository
     * @param UtilsService $utilsService
     * @return Response
     * @Route("/", name="asf_history_history", methods={"GET"})
     */
    public function index(
        HistoryRepository $historyRepository,
        PresidentRepository $presidentRepository,
        UtilsService $utilsService
    ): Response {
        $histories = $historyRepository->findBy([], [
            'date' => 'ASC'
        ]);
        $historiesByDate = $utilsService->getHistoriesByDate($histories);

        return $this->render('asf/history/index.html.twig', [
            'histories' => $historiesByDate,
            'presidents' => $presidentRepository->findBy([], [
                'date' => 'ASC'
            ]),
        ]);
    }

    /**
     * @Route("/new", name="asf_history_history_new", methods={"GET","POST"})
     * @param Request $request
     * @param SluggerInterface $slugger
     * @return Response
     */
    public function new(Request $request, SluggerInterface $slugger): Response
    {
        $history = new History();
        $form = $this->createForm(HistoryType::class, $history);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();

            $imageFile = $form->get('fileimage')->getData();

            if ($imageFile) {
                $imageFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFilename = $slugger->slug($imageFilename);
                $newImageFile = $safeImageFilename . '-' . uniqid('', false) . '.' . $imageFile->guessExtension();

                try {
                    $imageFile->move(
                        $this->getParameter('upload_dir_history'),
                        $newImageFile
                    );
                } catch (FileException $e) {
                }
                $history->setImage($newImageFile);
            }
            $entityManager->persist($history);
            $entityManager->flush();

            return $this->redirectToRoute('admin_history');
        }

        return $this->render('asf/history/new.html.twig', [
            'history' => $history,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/show/{id}", name="asf_history_history_show", methods={"GET"})
     * @param History $history
     * @return Response
     */
    public function show(History $history): Response
    {
        return $this->render('asf/history/show.html.twig', [
            'history' => $history,
        ]);
    }

    /**
     * @Route("/edit/{id}", name="asf_history_history_edit", methods={"GET","POST"})
     * @param Request $request
     * @param History $history
     * @param SluggerInterface $slugger
     * @return Response
     */
    public function edit(Request $request, History $history, SluggerInterface $slugger): Response
    {
        $form = $this->createForm(HistoryType::class, $history);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $imageFile = $form->get('fileimage')->getData();
            if ($imageFile !== null) {
                $filename = $history->getImage();
                if ($filename !== '' && is_string($this->getParameter('upload_dir_history'))) {
                    $path = $this->getParameter('upload_dir_history') . $filename;
                    unlink($path);
                }

                $imageFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFilename = $slugger->slug($imageFilename);
                $newImageFile = $safeImageFilename . '-' . uniqid('', false) . '.' . $imageFile->guessExtension();

                try {
                    $imageFile->move(
                        $this->getParameter('upload_dir_history'),
                        $newImageFile
                    );
                } catch (FileException $e) {
                }
                $history->setImage($newImageFile);
            }
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_history');
        }

        return $this->render('asf/history/edit.html.twig', [
            'history' => $history,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/delete/{id}", name="asf_history_history_delete", methods={"DELETE"})
     * @param Request $request
     * @param History $history
     * @param EntityManagerInterface $entityManager
     * @return Response
     */
    public function delete(Request $request, History $history, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $history->getId(), $request->request->get('_token'))) {
            $filename = $history->getImage();
            if ($filename !== '' && is_string($this->getParameter('upload_dir_history'))) {
                $path = $this->getParameter('upload_dir_history') . $filename;
                unlink($path);
            }

            $entityManager->remove($history);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_history');
    }
}
