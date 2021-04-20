<?php

namespace App\Controller;

use App\Entity\HomeSection;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class SportController
 * @package App\Controller
 * @Route("/sectionSport")
 */
class SportController extends AbstractController
{
    /**
     * @Route("/{id}", name="sectionSport", methods={"GET"})
     * @param HomeSection $section
     * @return Response
     */
    public function sport(HomeSection $section): Response
    {
        return $this->render('section/sports/sport.html.twig', [
            'home_section' => $section,
        ]);
    }
}
