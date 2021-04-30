<?php

namespace App\Controller;

use App\Entity\HomeSection;
use App\Form\HomeSectionType;
use App\Repository\HomeSectionRepository;
use App\Service\NavbarGenerator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Doctrine\ORM\EntityManagerInterface;

/**
 * @Route("/homeSection")
 */
class HomeSectionController extends AbstractController
{
    /**
     * @Route("/", name="home_section", methods={"GET"})
     * @param HomeSectionRepository $homeSectionRep
     * @param NavbarGenerator $navbarGenerator
     * @return Response
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function index(HomeSectionRepository $homeSectionRep, NavbarGenerator $navbarGenerator): Response
    {
        $homeSections = $homeSectionRep->findAll();
        $sectionsOrdered = [];
        foreach ($homeSections as $homeSection) {
            $sectionsOrdered[$homeSection->getSection()->getName()] = $homeSection;
        }
        ksort($sectionsOrdered);
        $htmlNav = $navbarGenerator->getNav();
        return $this->render('home_section/layout.html.twig', [
            'home_sections' => $sectionsOrdered,
            'html_nav' => $htmlNav,
        ]);
    }

    /**
     * @Route("/new", name="home_section_new", methods={"GET","POST"})
     */
    public function new(Request $request, SluggerInterface $slugger): Response
    {
        $homeSection = new HomeSection();
        $form = $this->createForm(HomeSectionType::class, $homeSection);
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
                $homeSection->setImage($newImageFile);
            }
            $entityManager->persist($homeSection);
            $entityManager->flush();

            return $this->redirectToRoute('admin_homeSection');
        }

        return $this->render('home_section/new.html.twig', [
            'home_section' => $homeSection,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/show/{id}", name="home_section_show", methods={"GET"})
     * @param HomeSection $homeSection
     * @return Response
     */
    public function show(HomeSection $homeSection): Response
    {
        return $this->render('home_section/show.html.twig', [
            'home_section' => $homeSection,
        ]);
    }

    /**
     * @Route("/edit/{id}", name="home_section_edit", methods={"GET","POST"})
     * @param Request $request
     * @param HomeSection $homeSection
     * @param SluggerInterface $slugger
     * @return Response
     */
    public function edit(Request $request, HomeSection $homeSection, SluggerInterface $slugger): Response
    {
        $form = $this->createForm(HomeSectionType::class, $homeSection);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $imageFile = $form->get('fileimage')->getData();
            if ($imageFile !== null) {
                $filename = $homeSection->getImage();
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
                $homeSection->setImage($newImageFile);
            }
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_homeSection');
        }

        return $this->render('home_section/edit.html.twig', [
            'home_section' => $homeSection,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/delete/{id}", name="home_section_delete", methods={"DELETE"})
     */
    public function delete(Request $request, HomeSection $homeSection, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $homeSection->getId(), $request->request->get('_token'))) {
            $filename = $homeSection->getImage();
            if (is_string($this->getParameter('upload_dir'))) {
                $path = $this->getParameter('upload_dir') . $filename;
                unlink($path);
            }
            $entityManager->remove($homeSection);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_homeSection');
    }
}
