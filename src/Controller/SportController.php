<?php

namespace App\Controller;

use App\Entity\Section;
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
