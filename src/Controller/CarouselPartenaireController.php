<?php

namespace App\Controller;

use App\Entity\CarouselPartenaire;
use App\Form\CarouselPartenaireType;
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
class CarouselPartenaireController extends AbstractController
{
    /**
     * @Route("/home/carousel/partenaire/new", name="home_carousel_partenaire_new", methods={"GET","POST"})
     * @param Request $request
     * @param SluggerInterface $slugger
     * @return Response
     */
    public function new(Request $request, SluggerInterface $slugger): Response
    {
        $carouselPartenaire = new CarouselPartenaire();
        $form = $this->createForm(CarouselPartenaireType::class, $carouselPartenaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($carouselPartenaire);
            $entityManager->flush();

            return $this->redirectToRoute('admin_carousel_partenaire');
        }

        return $this->render('home/carousel_partenaire/new.html.twig', [
            'carousel_partenaire' => $carouselPartenaire,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/home/carousel/partenaire/show/{id}", name="home_carousel_partenaire_show", methods={"GET"})
     * @param CarouselPartenaire $carouselPartenaire
     * @return Response
     */
    public function show(CarouselPartenaire $carouselPartenaire): Response
    {
        return $this->render('home/carousel_partenaire/show.html.twig', [
            'carousel_partenaire' => $carouselPartenaire,
        ]);
    }

    /**
     * @Route("/home/carousel/partenaire/edit/{id}", name="home_carousel_partenaire_edit", methods={"GET","POST"})
     * @param Request $request
     * @param CarouselPartenaire $carouselPartenaire
     * @param SluggerInterface $slugger
     * @return Response
     */
    public function edit(Request $request, CarouselPartenaire $carouselPartenaire, SluggerInterface $slugger): Response
    {
        $form = $this->createForm(CarouselPartenaireType::class, $carouselPartenaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_carousel_partenaire');
        }

        return $this->render('home/carousel_partenaire/edit.html.twig', [
            'carousel_partenaire' => $carouselPartenaire,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/home/carousel/partenaire/delete/{id}", name="home_carousel_partenaire_delete", methods={"DELETE"})
     * @param Request $request
     * @param CarouselPartenaire $carouselPartenaire
     * @param EntityManagerInterface $entityManager
     * @return Response
     */
    public function delete(
        Request $request,
        CarouselPartenaire $carouselPartenaire,
        EntityManagerInterface $entityManager
    ): Response {
        if ($this->isCsrfTokenValid('delete' . $carouselPartenaire->getId(), $request->request->get('_token'))) {
            $entityManager->remove($carouselPartenaire);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_carousel_partenaire');
    }
}
