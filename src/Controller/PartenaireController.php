<?php

namespace App\Controller;

use App\Entity\Partenaire;
use App\Form\PartenaireType;
use App\Repository\PartenaireRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

/**
 * @Route("/partenaire")
 */
class PartenaireController extends AbstractController
{
    /**
     * @Route("/", name="partenaire", methods={"GET"})
     * @param PartenaireRepository $partenaireRepository
     * @return Response
     */
    public function index(PartenaireRepository $partenaireRepository): Response
    {
        return $this->render('partenaire/index.html.twig', [
            'partenaires' => $partenaireRepository->findBy([], [
                'name' => 'ASC'
            ]),
        ]);
    }

    /**
     * @Route("/new", name="partenaire_new", methods={"GET","POST"})
     * @param Request $request
     * @param SluggerInterface $slugger
     * @return Response
     */
    public function new(Request $request, SluggerInterface $slugger): Response
    {
        $partenaire = new Partenaire();
        $form = $this->createForm(PartenaireType::class, $partenaire);
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
                        $this->getParameter('upload_dir_partenaire'),
                        $newImageFile
                    );
                } catch (FileException $e) {
                }
                $partenaire->setImage($newImageFile);
            }
            $entityManager->persist($partenaire);
            $entityManager->flush();

            return $this->redirectToRoute('admin_partenaire');
        }

        return $this->render('partenaire/new.html.twig', [
            'partenaire' => $partenaire,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/show/{id}", name="partenaire_show", methods={"GET"})
     * @param Partenaire $partenaire
     * @return Response
     */
    public function show(Partenaire $partenaire): Response
    {
        return $this->render('partenaire/show.html.twig', [
            'partenaire' => $partenaire,
        ]);
    }

    /**
     * @Route("/edit/{id}", name="partenaire_edit", methods={"GET","POST"})
     * @param Request $request
     * @param Partenaire $partenaire
     * @param SluggerInterface $slugger
     * @return Response
     */
    public function edit(Request $request, Partenaire $partenaire, SluggerInterface $slugger): Response
    {
        $form = $this->createForm(PartenaireType::class, $partenaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $imageFile = $form->get('fileimage')->getData();
            if ($imageFile !== null) {
                $filename = $partenaire->getImage();
                if ($filename !== '' && is_string($this->getParameter('upload_dir_partenaire'))) {
                    $path = $this->getParameter('upload_dir_partenaire') . $filename;
                    unlink($path);
                }
                $imageFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFilename = $slugger->slug($imageFilename);
                $newImageFile = $safeImageFilename . '-' . uniqid('', false) . '.' . $imageFile->guessExtension();

                try {
                    $imageFile->move(
                        $this->getParameter('upload_dir_partenaire'),
                        $newImageFile
                    );
                } catch (FileException $e) {
                }
                $partenaire->setImage($newImageFile);
            }
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_partenaire');
        }

        return $this->render('partenaire/edit.html.twig', [
            'partenaire' => $partenaire,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/delete/{id}", name="partenaire_delete", methods={"DELETE"})
     * @param Request $request
     * @param Partenaire $partenaire
     * @param EntityManagerInterface $entityManager
     * @return Response
     */
    public function delete(Request $request, Partenaire $partenaire, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $partenaire->getId(), $request->request->get('_token'))) {
            $filename = $partenaire->getImage();
            if ($filename !== '' && is_string($this->getParameter('upload_dir_actuality'))) {
                $path = $this->getParameter('upload_dir_actuality') . $filename;
                unlink($path);
            }
            $entityManager->remove($partenaire);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_partenaire');
    }
}
