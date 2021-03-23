<?php

namespace App\Controller;

use App\Entity\CarouselPartenaire;
use App\Form\CarouselPartenaireType;
use App\Repository\CarouselSectionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/carousel/partenaire")
 */
class CarouselPartenaireController extends AbstractController
{
    /**
     * @Route("/", name="carousel_partenaire_index", methods={"GET"})
     */
    public function index(CarouselSectionRepository $carouselSectionRepository): Response
    {
        return $this->render('carousel_partenaire/index.html.twig', [
            'carousel_partenaires' => $carouselSectionRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="carousel_partenaire_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $carouselPartenaire = new CarouselPartenaire();
        $form = $this->createForm(CarouselPartenaireType::class, $carouselPartenaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($carouselPartenaire);
            $entityManager->flush();

            return $this->redirectToRoute('carousel_partenaire_index');
        }

        return $this->render('carousel_partenaire/new.html.twig', [
            'carousel_partenaire' => $carouselPartenaire,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="carousel_partenaire_show", methods={"GET"})
     */
    public function show(CarouselPartenaire $carouselPartenaire): Response
    {
        return $this->render('carousel_partenaire/show.html.twig', [
            'carousel_partenaire' => $carouselPartenaire,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="carousel_partenaire_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, CarouselPartenaire $carouselPartenaire): Response
    {
        $form = $this->createForm(CarouselPartenaireType::class, $carouselPartenaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('carousel_partenaire_index');
        }

        return $this->render('carousel_partenaire/edit.html.twig', [
            'carousel_partenaire' => $carouselPartenaire,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="carousel_partenaire_delete", methods={"DELETE"})
     */
    public function delete(Request $request, CarouselPartenaire $carouselPartenaire): Response
    {
        if ($this->isCsrfTokenValid('delete' . $carouselPartenaire->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($carouselPartenaire);
            $entityManager->flush();
        }

        return $this->redirectToRoute('carousel_partenaire_index');
    }
}
