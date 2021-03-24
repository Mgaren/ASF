<?php

namespace App\Controller;

use App\Repository\CarouselHistoryRepository;
use App\Repository\CarouselSectionRepository;
use App\Repository\CarouselPartenaireRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class HomeController
 * @package App\Controller
 */
class HomeController extends AbstractController
{
    /**
     * @param CarouselHistoryRepository $carouselHistory
     * @param CarouselSectionRepository $carouselSection
     * @param CarouselPartenaireRepository $carouselPartenaire
     * @return Response
     * @Route("/", name="index", methods={"GET"})
     */
    public function index(
        CarouselHistoryRepository $carouselHistory,
        CarouselSectionRepository $carouselSection,
        CarouselPartenaireRepository $carouselPartenaire
    ): Response {
        return $this->render('home/index.html.twig', [
            'carousel_histories' => $carouselHistory->findAll(),
            'carousel_sections' => $carouselSection->findAll(),
            'carousel_partenaires' => $carouselPartenaire->findAll(),
        ]);
    }
}
