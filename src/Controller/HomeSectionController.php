<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Section;
use App\Form\SectionType;
use App\Repository\SectionRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\String\Slugger\SluggerInterface;

/**
 * Class HomeSectionController
 * @package App\Controller
 * @Route("/section")
 */
class HomeSectionController extends AbstractController
{
    /**
     * @param SectionRepository $sectionRepository
     * @return Response
     * @Route("/", name="section", methods={"GET"})
     */
    public function index(SectionRepository $sectionRepository): Response
    {
        return $this->render('section/index.html.twig', [
            'sections' => $sectionRepository->findBy([], [
                'titre' => 'ASC'
            ]),
        ]);
    }

    /**
     * @Route("/section/new", name="section_new", methods={"GET","POST"})
     * @param Request $request
     * @param SluggerInterface $slugger
     * @return Response
     */
    public function new(Request $request, SluggerInterface $slugger): Response
    {
        $section = new Section();
        $form = $this->createForm(SectionType::class, $section);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();

            $imageFile = $form->get('fileimage')->getData();

            if ($imageFile) {
                $imageFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFilename = $slugger->slug($imageFilename);
                $newImageFile = $safeImageFilename . '-' . uniqid('', true) . '-' . $imageFile->guessExtension();

                try {
                    $imageFile->move(
                        $this->getParameter('upload_dir'),
                        $newImageFile
                    );
                } catch (FileException $e) {
                }
                $section->setImage($newImageFile);
            }

            $entityManager->persist($section);
            $entityManager->flush();

            return $this->redirectToRoute('admin_homeSection');
        }

        return $this->render('section/new.html.twig', [
            'section' => $section,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/section/show/{id}", name="section_show", methods={"GET"})
     * @param Section $section
     * @return Response
     */
    public function show(Section $section): Response
    {
        return $this->render('section/show.html.twig', [
            'section' => $section,
        ]);
    }

    /**
     * @Route("/section/edit/{id}", name="section_edit", methods={"GET","POST"})
     * @param Request $request
     * @param Section $section
     * @param SluggerInterface $slugger
     * @return Response
     */
    public function edit(Request $request, Section $section, SluggerInterface $slugger): Response
    {
        $form = $this->createForm(SectionType::class, $section);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $imageFile = $form->get('fileimage')->getData();
            if ($imageFile !== null) {
                $filename = $section->getImage();
                if (is_string($this->getParameter('upload_dir'))) {
                    $path = $this->getParameter('upload_dir') . $filename;
                    unlink($path);
                }

                $imageFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFilename = $slugger->slug($imageFilename);
                $newImageFile = $safeImageFilename . '-' . uniqid('', true) . '-' . $imageFile->guessExtension();

                try {
                    $imageFile->move(
                        $this->getParameter('upload_dir'),
                        $newImageFile
                    );
                } catch (FileException $e) {
                }
                $section->setImage($newImageFile);
            }
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_homeSection');
        }

        return $this->render('section/edit.html.twig', [
            'section' => $section,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/section/{id}", name="section_delete", methods={"DELETE"})
     * @param Request $request
     * @param Section $section
     * @param EntityManagerInterface $entityManager
     * @return Response
     */
    public function delete(Request $request, Section $section, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $section->getId(), $request->request->get('_token'))) {
            $filename = $section->getImage();
            if (is_string($this->getParameter('upload_dir'))) {
                $path = $this->getParameter('upload_dir') . $filename;
                unlink($path);
            }

            $entityManager->remove($section);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_homeSection');
    }

    /**
     * @Route("/section/sport/{id}", name="section_sport", methods={"GET"})
     * @param Section $section
     * @return Response
     */
    public function sport(Section $section): Response
    {
        return $this->render('section/sports/sport.html.twig', [
            'section' => $section,
        ]);
    }
}
