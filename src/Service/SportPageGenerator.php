<?php

namespace App\Service;

use App\Entity\SectionSport;
use App\Entity\SectionPlanning;
use Doctrine\ORM\EntityManagerInterface;
use Twig\Environment;

class SportPageGenerator
{
    private EntityManagerInterface $entityManager;
    private Environment $twig;
    /**
     * Service constructor.
     */
    public function __construct(EntityManagerInterface $entityManager, Environment $twig)
    {
        $this->entityManager = $entityManager;
        $this->twig = $twig;
    }

    /**
     * @param int $id
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function getSportPlanning(int $id): string
    {
        $sportPlanning = $this->entityManager->getRepository(SectionPlanning::class)->findBy(
            ['section' => $id ]
        );
        $displayCotisation = false;
        foreach ($sportPlanning as $planning) {
            /** @var SectionPlanning $planning */
            $cotisation = $planning->getCotisation();
            if ($cotisation) {
                $displayCotisation = true;
                break;
            }
        }
        /*foreach ($sportPlanning as $planning) {
            $sectionDay = $planning->getSection()->getId();
            foreach ($sectionDay as $days) {
                $day = $days->getDay()
            }
        }
        $sportPlannings = $this->entityManager->getRepository(SectionPlanning::class)->findAll();
        $day_by_day = [];
        foreach ($sportPlannings as $day) {
            $dayId = $day->getDay()->getId();
            $day_by_day[$dayId]['days'] = $day->getDay()->getId();
            $day_by_day[$dayId]['day'][] = $day;
        }*/
        return $this->twig->render('section/section_planning/planning.html.twig', [
            'section_plannings' => $sportPlanning,
            'display_cotisation' => $displayCotisation,
            //'days' => $day_by_day,
        ]);
    }

    /**
     * @param int $id
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function getSport(int $id): string
    {
        $sport = $this->entityManager->getRepository(SectionSport::class)->findBy(
            ['section' => $id ]
        );
        return $this->twig->render('section/section_sport/sport.html.twig', ['section_sports' => $sport]);
    }
}
