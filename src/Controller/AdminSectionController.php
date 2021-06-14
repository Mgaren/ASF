<?php

namespace App\Controller;

use App\Repository\SectionCategoryRepository;
use App\Repository\SectionPlanningRepository;
use App\Repository\SectionSportRepository;
use App\Service\AdminSectionGenerator;
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
     * @param AdminSectionGenerator $generator
     * @return Response
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function addSectionCategory(
        Request $request,
        SectionCategoryRepository $categoryRepository,
        PaginatorInterface $paginator,
        AdminSectionGenerator $generator
    ): Response {
        $sectionCategories = $categoryRepository->findAll();
        $sectionsOrdered = [];
        $currentId = null;
        if (isset($_GET['section'])) {
            $currentId = $_GET['section'];
        }
        foreach ($sectionCategories as $sectionCategory) {
            if ($currentId && $currentId == $sectionCategory->getSection()->getId()) {
                $sectionsOrdered[$sectionCategory->getNumber()][] = $sectionCategory;
            } elseif (!$currentId) {
                $sectionsOrdered[$sectionCategory->getNumber()][] = $sectionCategory;
            }
        }
        ksort($sectionsOrdered);
        $sectionCategories = $paginator->paginate(
            $sectionsOrdered,
            $request->query->getInt('page', 1),
            10
        );
        $htmlNav = $generator->getAdminSectionGenerator();
        return $this->render('admin_section/sectionCategory.html.twig', [
            'section_categories' => $sectionCategories,
            'html_nav' => $htmlNav,
        ]);
    }

    /**
     * @Route("/section/planning", name="section_planning", methods={"GET"})
     * @param Request $request
     * @param SectionPlanningRepository $planningRepository
     * @param PaginatorInterface $paginator
     * @param AdminSectionGenerator $generator
     * @return Response
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function addSectionPlanning(
        Request $request,
        SectionPlanningRepository $planningRepository,
        PaginatorInterface $paginator,
        AdminSectionGenerator $generator
    ): Response {
        $sectionPlannings = $planningRepository->findAll();
        $sectionsOrdered = [];
        $currentId = null;
        if (isset($_GET['section'])) {
            $currentId = $_GET['section'];
        }
        foreach ($sectionPlannings as $sectionPlanning) {
            if ($currentId && $currentId == $sectionPlanning->getSection()->getId()) {
                $sectionsOrdered[$sectionPlanning->getId()][] = $sectionPlanning;
            } elseif (!$currentId) {
                $sectionsOrdered[$sectionPlanning->getId()][] = $sectionPlanning;
            }
        }
        ksort($sectionsOrdered);
        $sectionPlannings = $paginator->paginate(
            $sectionsOrdered,
            $request->query->getInt('page', 1),
            10
        );
        $htmlNav = $generator->getAdminSectionGenerator();
        return $this->render('admin_section/sectionPlanning.html.twig', [
            'section_plannings' => $sectionPlannings,
            'html_nav' => $htmlNav,
        ]);
    }

    /**
     * @Route("/section/sport", name="section_sport", methods={"GET"})
     * @param Request $request
     * @param SectionSportRepository $sportRepository
     * @param PaginatorInterface $paginator
     * @param AdminSectionGenerator $generator
     * @return Response
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function addSectionSport(
        Request $request,
        SectionSportRepository $sportRepository,
        PaginatorInterface $paginator,
        AdminSectionGenerator $generator
    ): Response {
        $sectionSports = $sportRepository->findAll();
        $sectionsOrdered = [];
        $currentId = null;
        if (isset($_GET['section'])) {
            $currentId = $_GET['section'];
        }
        foreach ($sectionSports as $sectionSport) {
            if ($currentId && $currentId == $sectionSport->getSection()->getId()) {
                $sectionsOrdered[$sectionSport->getSection()->getName()] = $sectionSport;
            }
        }
        ksort($sectionsOrdered);
        $sectionSports = $paginator->paginate(
            $sectionsOrdered,
            $request->query->getInt('page', 1),
            10
        );
        $htmlNav = $generator->getAdminSectionGenerator();
        return $this->render('admin_section/sectionSport.html.twig', [
            'section_sports' => $sectionSports,
            'html_nav' => $htmlNav,
        ]);
    }
}
