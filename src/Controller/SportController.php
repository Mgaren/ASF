<?php

namespace App\Controller;

use App\Entity\Section;
use App\Repository\SectionPlanningRepository;
use App\Repository\SectionSportRepository;
use App\Service\SportPageGenerator;
use App\Service\NavbarGenerator;
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
     * @param Section $sectionRep
     * @param SectionPlanningRepository $sectionPlanningRep
     * @param SectionSportRepository $sectionSportRep
     * @param SportPageGenerator $sportPageGenerator
     * @param NavbarGenerator $navbarGenerator
     * @return Response
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function sport(
        Section $sectionRep,
        SectionPlanningRepository $sectionPlanningRep,
        SectionSportRepository $sectionSportRep,
        SportPageGenerator $sportPageGenerator,
        NavbarGenerator $navbarGenerator
    ): Response {
        /*$sectionPlannings = $sectionPlanningRep->findAll();
        $sectionPlanningById = [];
        foreach ($sectionPlannings as $sectionPlanning) {
            $sectionPlanningId = $sectionPlanning->getSection()->getName();
            $sectionPlanningById[$sectionPlanningId]['section'] = $sectionPlanning->getSection()->getName();
            $sectionPlanningById[$sectionPlanningId]['planning'][] = $sectionPlanning;
        }
        $sectionSports = $sectionSportRep->findAll();
        $sectionsSportById = [];
        foreach ($sectionSports as $sectionSport) {
            $sectionsSportById[$sectionSport->getSection()->getName()] = $sectionSport;
        }*/
        $htmlNav = $navbarGenerator->getNav();
        //$htmlSportPlanning = $sportPageGenerator->sportPlanning();
        //$htmlSport = $sportPageGenerator->sport();

        return $this->render('section/layout.html.twig', [
            'section' => $sectionRep,
            //'section_plannings' => $htmlSportPlanning,
            //'section_sports' => $htmlSport,
            'html_nav' => $htmlNav,
        ]);
    }
}
