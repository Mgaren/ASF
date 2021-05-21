<?php

namespace App\Controller;

use App\Entity\VerticalHistory;
use App\Form\VerticalHistoryType;
use App\Repository\VerticalHistoryRepository;
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
 * @Route("/asf/history")
 */
class VerticalHistoryController extends AbstractController
{
    /**
     * @param VerticalHistoryRepository $vertHistRepository
     * @param UtilsService $utilsService
     * @return Response
     * @Route("/", name="asf_history", methods={"GET"})
     */
    public function index(VerticalHistoryRepository $vertHistRepository, UtilsService $utilsService): Response
    {
        $verticalHistories = $vertHistRepository->findBy([], [
            'date' => 'ASC'
        ]);

        $verticalHistByDate = $utilsService->getHistoriesByDate($verticalHistories);

        return $this->render('asf/verticalhistory/index.html.twig', [
            'verticalHistories' => $verticalHistByDate,
        ]);
    }

    /**
     * @Route("/new", name="asf_history_new", methods={"GET","POST"})
     * @param Request $request
     * @param SluggerInterface $slugger
     * @return Response
     */
    public function new(Request $request, SluggerInterface $slugger): Response
    {
        $verticalHistory = new VerticalHistory();
        $form = $this->createForm(VerticalHistoryType::class, $verticalHistory);
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
                $verticalHistory->setImage($newImageFile);
            }
            $entityManager->persist($verticalHistory);
            $entityManager->flush();

            return $this->redirectToRoute('admin_verticalHistory');
        }

        return $this->render('asf/verticalhistory/new.html.twig', [
            'verticalHistory' => $verticalHistory,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/show/{id}", name="asf_history_show", methods={"GET"})
     * @param VerticalHistory $verticalHistory
     * @return Response
     */
    public function show(VerticalHistory $verticalHistory): Response
    {
        return $this->render('asf/verticalhistory/show.html.twig', [
            'verticalHistory' => $verticalHistory,
        ]);
    }

    /**
     * @Route("/edit/{id}", name="asf_history_edit", methods={"GET","POST"})
     * @param Request $request
     * @param VerticalHistory $verticalHistory
     * @param SluggerInterface $slugger
     * @return Response
     */
    public function edit(Request $request, VerticalHistory $verticalHistory, SluggerInterface $slugger): Response
    {
        $form = $this->createForm(VerticalHistoryType::class, $verticalHistory);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $imageFile = $form->get('fileimage')->getData();
            if ($imageFile !== null) {
                $filename = $verticalHistory->getImage();
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
                $verticalHistory->setImage($newImageFile);
            }
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_verticalHistory');
        }

        return $this->render('asf/verticalhistory/edit.html.twig', [
            'verticalHistory' => $verticalHistory,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/delete/{id}", name="asf_history_delete", methods={"DELETE"})
     * @param Request $request
     * @param VerticalHistory $verticalHistory
     * @param EntityManagerInterface $entityManager
     * @return Response
     */
    public function delete(
        Request $request,
        VerticalHistory $verticalHistory,
        EntityManagerInterface $entityManager
    ): Response {
        if ($this->isCsrfTokenValid('delete' . $verticalHistory->getId(), $request->request->get('_token'))) {
            $filename = $verticalHistory->getImage();
            if ($filename !== '' && is_string($this->getParameter('upload_dir_history'))) {
                $path = $this->getParameter('upload_dir_history') . $filename;
                unlink($path);
            }

            $entityManager->remove($verticalHistory);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_verticalHistory');
    }
}
