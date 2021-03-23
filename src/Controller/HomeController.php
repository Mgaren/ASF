<?php

namespace App\Controller;

use App\Repository\CarouselHistoryRepository;
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
     * @return Response
     * @Route("/", name="index", methods={"GET"})
     */
    public function index(CarouselHistoryRepository $carouselHistory): Response
    {
        return $this->render('home/index.html.twig', [
            'carousel_histories' => $carouselHistory->findAll(),
        ]);
    }
}
