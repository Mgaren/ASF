<?php

namespace App\Controller;

use App\Repository\SectionCategoryRepository;
use App\Repository\SectionPlanningRepository;
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
        $sectionCategory = $categoryRepository->findBy([], [
            'id' => 'ASC'
        ]);
        $sectionCategory = $paginator->paginate(
            $sectionCategory,
            $request->query->getInt('page', 1),
            10
        );
        return $this->render('admin_section/sectionCategory.html.twig', [
            'section_categories' => $sectionCategory
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
        $sectionPlanning = $planningRepository->findBy([], [
            'id' => 'ASC'
        ]);
        $sectionPlanning = $paginator->paginate(
            $sectionPlanning,
            $request->query->getInt('page', 1),
            10
        );
        return $this->render('admin_section/sectionPlanning.html.twig', [
            'section_plannings' => $sectionPlanning
        ]);
    }
}
