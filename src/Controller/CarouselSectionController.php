<?php

namespace App\Controller;

use App\Entity\CarouselSection;
use App\Form\CarouselSectionType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

/**
 * @Route("/home")
 */
class CarouselSectionController extends AbstractController
{
    /**
     * @Route("/home/carousel/section/new", name="home_carousel_section_new", methods={"GET","POST"})
     * @param Request $request
     * @param SluggerInterface $slugger
     * @return Response
     */
    public function new(Request $request, SluggerInterface $slugger): Response
    {
        $carouselSection = new CarouselSection();
        $form = $this->createForm(CarouselSectionType::class, $carouselSection);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($carouselSection);
            $entityManager->flush();

            return $this->redirectToRoute('admin_carousel_section');
        }

        return $this->render('home/carousel_section/new.html.twig', [
            'carousel_section' => $carouselSection,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/home/carousel/section/show/{id}", name="home_carousel_section_show", methods={"GET"})
     * @param CarouselSection $carouselSection
     * @return Response
     */
    public function show(CarouselSection $carouselSection): Response
    {
        return $this->render('home/carousel_section/show.html.twig', [
            'carousel_section' => $carouselSection,
        ]);
    }

    /**
     * @Route("/home/carousel/section/edit/{id}", name="home_carousel_section_edit", methods={"GET","POST"})
     * @param Request $request
     * @param CarouselSection $carouselSection
     * @param SluggerInterface $slugger
     * @return Response
     */
    public function edit(Request $request, CarouselSection $carouselSection, SluggerInterface $slugger): Response
    {
        $form = $this->createForm(CarouselSectionType::class, $carouselSection);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_carousel_section');
        }

        return $this->render('home/carousel_section/edit.html.twig', [
            'carousel_section' => $carouselSection,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/home/carousel/section/delete/{id}", name="home_carousel_section_delete", methods={"DELETE"})
     * @param Request $request
     * @param CarouselSection $carouselSection
     * @param EntityManagerInterface $entityManager
     * @return Response
     */
    public function delete(
        Request $request,
        CarouselSection $carouselSection,
        EntityManagerInterface $entityManager
    ): Response {
        if ($this->isCsrfTokenValid('delete' . $carouselSection->getId(), $request->request->get('_token'))) {
            $entityManager->remove($carouselSection);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_carousel_section');
    }
}
