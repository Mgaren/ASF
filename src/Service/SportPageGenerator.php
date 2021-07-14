<?php

namespace App\Service;

use App\Entity\Actuality;
use App\Entity\SectionSport;
use App\Entity\SectionPlanning;
use App\Repository\ActualityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
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
        $planningByWeekDay = [];
        foreach ($sportPlanning as $planning) {
            $day = $planning->getDay();
            $planningByWeekDay[$day][] = $planning;
            /** @var SectionPlanning $planning */
            $cotisation = $planning->getCotisation();
            if ($cotisation) {
                $displayCotisation = true;
                //break;
            }
        }


        return $this->twig->render('section/section_planning/planning.html.twig', [
            'section_plannings' => $planningByWeekDay,
            'display_cotisation' => $displayCotisation,
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

    /**
     * @param int $id
     * @return Response
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function getActuality(int $id): string
    {
        $actualities = $this->entityManager->getRepository(Actuality::class)->findBy(
            ['section' => $id ]
        );
        /*$actualitiesOrdered = [];
        foreach ($actualities as $actuality) {
            $actualitiesOrdered[$actuality->getId()] = $actuality;
        }
        krsort($actualitiesOrdered);
        /** @var PaginatorInterface $paginator
        /** @var Request $request
        $actualities = $paginator->paginate(
            $actualitiesOrdered,
            $request->query->getInt('page', 1),
            3
        );*/
        return $this->twig->render('section/actuality.html.twig', ['actualities' => $actualities]);
    }
}
