<?php

namespace App\Controller;

use App\Entity\CarouselSection;
use App\Form\CarouselSectionType;
use App\Repository\CarouselSectionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/carousel/section")
 */
class CarouselSectionController extends AbstractController
{
    /**
     * @Route("/", name="carousel_section_index", methods={"GET"})
     */
    public function index(CarouselSectionRepository $carouselSectionRepository): Response
    {
        return $this->render('carousel_section/index.html.twig', [
            'carousel_sections' => $carouselSectionRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="carousel_section_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $carouselSection = new CarouselSection();
        $form = $this->createForm(CarouselSectionType::class, $carouselSection);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($carouselSection);
            $entityManager->flush();

            return $this->redirectToRoute('carousel_section_index');
        }

        return $this->render('carousel_section/new.html.twig', [
            'carousel_section' => $carouselSection,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="carousel_section_show", methods={"GET"})
     */
    public function show(CarouselSection $carouselSection): Response
    {
        return $this->render('carousel_section/show.html.twig', [
            'carousel_section' => $carouselSection,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="carousel_section_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, CarouselSection $carouselSection): Response
    {
        $form = $this->createForm(CarouselSectionType::class, $carouselSection);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('carousel_section_index');
        }

        return $this->render('carousel_section/edit.html.twig', [
            'carousel_section' => $carouselSection,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="carousel_section_delete", methods={"DELETE"})
     */
    public function delete(Request $request, CarouselSection $carouselSection): Response
    {
        if ($this->isCsrfTokenValid('delete' . $carouselSection->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($carouselSection);
            $entityManager->flush();
        }

        return $this->redirectToRoute('carousel_section_index');
    }
}
