<?php

namespace App\Controller;

use App\Repository\CarouselHistoryRepository;
use App\Repository\CarouselSectionRepository;
use App\Repository\CarouselPartenaireRepository;
use App\Repository\ActualityRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
     * @param Request $request
     * @param ActualityRepository $actualityRepository
     * @param PaginatorInterface $paginator
     * @return Response
     * @Route("/", name="index", methods={"GET"})
     */
    public function index(
        CarouselHistoryRepository $carouselHistory,
        CarouselSectionRepository $carouselSection,
        CarouselPartenaireRepository $carouselPartenaire,
        Request $request,
        ActualityRepository $actualityRepository,
        PaginatorInterface $paginator
    ): Response {
        $actuality = $actualityRepository->findBy([], [
            'id' => 'DESC'
        ]);
        $actuality = $paginator->paginate(
            $actuality,
            $request->query->getInt('page', 1),
            3
        );
        return $this->render('home/index.html.twig', [
            'carousel_histories' => $carouselHistory->findAll(),
            'carousel_sections' => $carouselSection->findAll(),
            'carousel_partenaires' => $carouselPartenaire->findAll(),
            'actualitys' => $actuality
        ]);
    }
}
