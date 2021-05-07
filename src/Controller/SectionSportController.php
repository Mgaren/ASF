<?php

namespace App\Controller;

use App\Entity\SectionSport;
use App\Form\SectionSportType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

/**
 * @Route("/section/sport")
 */
class SectionSportController extends AbstractController
{
    /**
     * @Route("/new", name="section_sport_new", methods={"GET","POST"})
     */
    public function new(Request $request, SluggerInterface $slugger): Response
    {
        $sectionSport = new SectionSport();
        $form = $this->createForm(SectionSportType::class, $sectionSport);
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
                        $this->getParameter('upload_dir_sports'),
                        $newImageFile
                    );
                } catch (FileException $e) {
                }
                $sectionSport->setImage($newImageFile);
            }
            $entityManager->persist($sectionSport);
            $entityManager->flush();

            return $this->redirectToRoute('admin_section_sport');
        }

        return $this->render('section/section_sport/new.html.twig', [
            'section_sport' => $sectionSport,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/show/{id}", name="section_sport_show", methods={"GET"})
     */
    public function show(SectionSport $sectionSport): Response
    {
        return $this->render('section/section_sport/show.html.twig', [
            'section_sport' => $sectionSport,
        ]);
    }

    /**
     * @Route("/edit/{id}", name="section_sport_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, SectionSport $sectionSport, SluggerInterface $slugger): Response
    {
        $form = $this->createForm(SectionSportType::class, $sectionSport);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $imageFile = $form->get('fileimage')->getData();
            if ($imageFile !== null) {
                $filename = $sectionSport->getImage();
                if ($filename !== '' && is_string($this->getParameter('upload_dir_sports'))) {
                    $path = $this->getParameter('upload_dir_sports') . $filename;
                    unlink($path);
                }
                $imageFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFilename = $slugger->slug($imageFilename);
                $newImageFile = $safeImageFilename . '-' . uniqid('', false) . '.' . $imageFile->guessExtension();

                try {
                    $imageFile->move(
                        $this->getParameter('upload_dir_sports'),
                        $newImageFile
                    );
                } catch (FileException $e) {
                }
                $sectionSport->setImage($newImageFile);
            }
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_section_sport');
        }

        return $this->render('section/section_sport/edit.html.twig', [
            'section_sport' => $sectionSport,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/delete/{id}", name="section_sport_delete", methods={"POST"})
     */
    public function delete(
        Request $request,
        SectionSport $sectionSport,
        EntityManagerInterface $entityManager
    ): Response {
        if ($this->isCsrfTokenValid('delete' . $sectionSport->getId(), $request->request->get('_token'))) {
            $filename = $sectionSport->getImage();
            if ($filename !== '' && is_string($this->getParameter('upload_dir_sports'))) {
                $path = $this->getParameter('upload_dir_sports') . $filename;
                unlink($path);
            }
            $entityManager->remove($sectionSport);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_section_sport');
    }
}
