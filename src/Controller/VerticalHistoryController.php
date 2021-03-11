<?php

namespace App\Controller;

use App\Entity\VerticalHistory;
use App\Form\VerticalHistoryType;
use App\Repository\VerticalHistoryRepository;
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
     * @return Response
     * @Route("/", name="asf_history", methods={"GET"})
     */
    public function index(
        VerticalHistoryRepository $vertHistRepository
    ): Response {
        return $this->render('asf/verticalhistory/index.html.twig', [
            'verticalHistorys' => $vertHistRepository->findBy([], [
                'titre' => 'ASC'
            ]),
        ]);
    }

    /**
     * @Route("/new", name="new", methods={"GET","POST"})
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
            'vertical_history' => $verticalHistory,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="show", methods={"GET"})
     * @param VerticalHistory $verticalHistory
     * @return Response
     */
    public function show(VerticalHistory $verticalHistory): Response
    {
        return $this->render('asf/verticalhistory/show.html.twig', [
            'vertical_history' => $verticalHistory,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="edit", methods={"GET","POST"})
     * @param Request $request
     * @param VerticalHistory $verticalHistory
     * @return Response
     */
    public function edit(Request $request, VerticalHistory $verticalHistory): Response
    {
        $form = $this->createForm(VerticalHistoryType::class, $verticalHistory);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_verticalHistory');
        }

        return $this->render('asf/verticalhistory/edit.html.twig', [
            'vertical_history' => $verticalHistory,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="delete", methods={"DELETE"})
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
