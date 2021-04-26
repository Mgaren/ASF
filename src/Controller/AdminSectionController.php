<?php

namespace App\Controller;

use App\Repository\SectionCategoryRepository;
use App\Repository\SectionPlanningRepository;
use App\Repository\SectionSportRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * class AdminSectionController
 * @package App\Controller
 * @Route("/admin", name="admin_")
 */
class AdminSectionController extends AbstractController
{
    /**
     * @Route("/section/category", name="section_category", methods={"GET"})
     * @param Request $request
     * @param SectionCategoryRepository $categoryRepository
     * @param PaginatorInterface $paginator
     * @return Response
     */
    public function addSectionCategory(
        Request $request,
        SectionCategoryRepository $categoryRepository,
        PaginatorInterface $paginator
    ): Response {
        $sectionCategories = $categoryRepository->findAll();
        $sectionsOrdered = [];
        foreach ($sectionCategories as $sectionCategory) {
            $sectionsOrdered[$sectionCategory->getSection()->getName()] = $sectionCategory;
        }
        ksort($sectionsOrdered);
        $sectionCategories = $paginator->paginate(
            $sectionsOrdered,
            $request->query->getInt('page', 1),
            10
        );
        return $this->render('admin_section/sectionCategory.html.twig', [
            'section_categories' => $sectionCategories
        ]);
    }

    /**
     * @Route("/section/planning", name="section_planning", methods={"GET"})
     * @param Request $request
     * @param SectionPlanningRepository $planningRepository
     * @param PaginatorInterface $paginator
     * @return Response
     */
    public function addSectionPlanning(
        Request $request,
        SectionPlanningRepository $planningRepository,
        PaginatorInterface $paginator
    ): Response {
        $sectionPlannings = $planningRepository->findAll();
        $sectionsOrdered = [];
        foreach ($sectionPlannings as $sectionPlanning) {
            $sectionsOrdered[$sectionPlanning->getSection()->getName()] = $sectionPlanning;
        }
        ksort($sectionsOrdered);
        $sectionPlannings = $paginator->paginate(
            $sectionsOrdered,
            $request->query->getInt('page', 1),
            10
        );
        return $this->render('admin_section/sectionPlanning.html.twig', [
            'section_plannings' => $sectionPlannings
        ]);
    }

    /**
     * @Route("/section/sport", name="section_sport", methods={"GET"})
     * @param Request $request
     * @param SectionSportRepository $sportRepository
     * @param PaginatorInterface $paginator
     * @return Response
     */
    public function addSectionSport(
        Request $request,
        SectionSportRepository $sportRepository,
        PaginatorInterface $paginator
    ): Response {
        $sectionSports = $sportRepository->findAll();
        $sectionsOrdered = [];
        foreach ($sectionSports as $sectionSport) {
            $sectionsOrdered[$sectionSport->getSection()->getName()] = $sectionSport;
        }
        ksort($sectionsOrdered);
        $sectionSports = $paginator->paginate(
            $sectionsOrdered,
            $request->query->getInt('page', 1),
            10
        );
        return $this->render('admin_section/sectionSport.html.twig', [
            'section_sports' => $sectionSports
        ]);
    }
}
