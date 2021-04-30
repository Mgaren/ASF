<?php

namespace App\Service;

use App\Entity\Section;
use Doctrine\ORM\EntityManagerInterface;
use Twig\Environment;

class NavbarGenerator
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
    public function getNav(): string
    {
        $sections = $this->entityManager->getRepository(Section::class)->findAll();
        $sections = $this->sortSections($sections);
        $htmlNav = $this->twig->render('_navSection.html.twig', ['sections' => $sections]);
        return $htmlNav;
    }

    /**
     * @param array $sections
     * @return array
     */
    public function sortSections(array $sections): array
    {
        $sectionsOrdered = [];
        foreach ($sections as $section) {
            $sectionsOrdered[$section->getName()] = $section;
        }
        ksort($sectionsOrdered);
        return $sectionsOrdered;
    }
}
