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
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function sportPlanning(): string
    {
        $sportPlanning = $this->entityManager->getRepository(SectionPlanning::class)->findBy(
            ['section' => 'section']
        );
        $htmlSportPlanning = $this->twig->render('section/layout.html.twig', ['section_planning' => $sportPlanning]);
        return $htmlSportPlanning;
    }

    /**
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function sport(): string
    {
        $sport = $this->entityManager->getRepository(SectionSport::class)->findBy(
            ['section' => 'section']
        );
        $htmlSport = $this->twig->render('section/layout.html.twig', ['section_sport' => $sport]);
        return $htmlSport;
    }
}
