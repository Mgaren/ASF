<?php

namespace App\Controller;

use App\Entity\Section;
use App\Service\SportPageGenerator;
use App\Service\NavbarGenerator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class SportController
 * @package App\Controller
 * @Route("/homeSection")
 */
class SportController extends AbstractController
{
    /**
     * @Route("/{id}", name="sectionSport", methods={"GET"})
     * @param Section $sectionRep
     * @param SportPageGenerator $sportPageGenerator
     * @param NavbarGenerator $navbarGenerator
     * @return Response
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function sport(
        Section $sectionRep,
        SportPageGenerator $sportPageGenerator,
        NavbarGenerator $navbarGenerator
    ): Response {
        $id = $sectionRep->getId();
        $htmlNav = $navbarGenerator->getNav();
        $htmlSportPlanning = $sportPageGenerator->getSportPlanning($id);
        $htmlSport = $sportPageGenerator->getSport($id);
        $htmlActualities = $sportPageGenerator->getActuality($id);

        return $this->render('section/layout.html.twig', [
            'section' => $sectionRep,
            'section_plannings' => $htmlSportPlanning,
            'section_sports' => $htmlSport,
            'html_nav' => $htmlNav,
            'actuality' => $htmlActualities
        ]);
    }
}
