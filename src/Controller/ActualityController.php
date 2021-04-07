<?php

namespace App\Controller;

use App\Entity\Actuality;
use App\Form\ActualityType;
use App\Repository\ActualityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

/**
 * @Route("/actuality")
 */
class ActualityController extends AbstractController
{
    /**
     * @Route("/", name="actuality", methods={"GET"})
     * @param ActualityRepository $actualityRepository
     * @return Response
     */
    public function index(ActualityRepository $actualityRepository): Response
    {
        return $this->render('actuality/index.html.twig', [
            'actualities' => $actualityRepository->findBy([], [
                'id' => 'DESC'
            ]),
        ]);
    }

    /**
     * @Route("/actuality/new", name="actuality_new", methods={"GET","POST"})
     * @param Request $request
     * @param SluggerInterface $slugger
     * @return Response
     */
    public function new(Request $request, SluggerInterface $slugger): Response
    {
        $actuality = new Actuality();
        $form = $this->createForm(ActualityType::class, $actuality);
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
                        $this->getParameter('upload_dir_actuality'),
                        $newImageFile
                    );
                } catch (FileException $e) {
                }
                $actuality->setImage($newImageFile);
            }
            $entityManager->persist($actuality);
            $entityManager->flush();

            return $this->redirectToRoute('admin_actuality');
        }

        return $this->render('actuality/new.html.twig', [
            'actuality' => $actuality,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/actuality/show/{id}", name="actuality_show", methods={"GET"})
     * @param Actuality $actuality
     * @return Response
     */
    public function show(Actuality $actuality): Response
    {
        return $this->render('actuality/show.html.twig', [
            'actuality' => $actuality,
        ]);
    }

    /**
     * @Route("/actuality/edit/{id}", name="actuality_edit", methods={"GET","POST"})
     * @param Request $request
     * @param Actuality $actuality
     * @param SluggerInterface $slugger
     * @return Response
     */
    public function edit(Request $request, Actuality $actuality, SluggerInterface $slugger): Response
    {
        $form = $this->createForm(ActualityType::class, $actuality);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $imageFile = $form->get('fileimage')->getData();
            if ($imageFile !== null) {
                $filename = $actuality->getImage();
                if ($filename !== '' && is_string($this->getParameter('upload_dir_actuality'))) {
                    $path = $this->getParameter('upload_dir_actuality') . $filename;
                    unlink($path);
                }
                $imageFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFilename = $slugger->slug($imageFilename);
                $newImageFile = $safeImageFilename . '-' . uniqid('', false) . '.' . $imageFile->guessExtension();

                try {
                    $imageFile->move(
                        $this->getParameter('upload_dir_actuality'),
                        $newImageFile
                    );
                } catch (FileException $e) {
                }
                $actuality->setImage($newImageFile);
            }
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_actuality');
        }

        return $this->render('actuality/edit.html.twig', [
            'actuality' => $actuality,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/actuality/delete/{id}", name="actuality_delete", methods={"DELETE"})
     * @param Request $request
     * @param Actuality $actuality
     * @param EntityManagerInterface $entityManager
     * @return Response
     */
    public function delete(Request $request, Actuality $actuality, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $actuality->getId(), $request->request->get('_token'))) {
            $filename = $actuality->getImage();
            if ($filename !== '' && is_string($this->getParameter('upload_dir_actuality'))) {
                $path = $this->getParameter('upload_dir_actuality') . $filename;
                unlink($path);
            }
            $entityManager->remove($actuality);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_actuality');
    }
}
