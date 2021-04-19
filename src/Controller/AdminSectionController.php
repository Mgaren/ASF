<?php

namespace App\Controller;

use App\Repository\BasketballCategoryRepository;
use App\Repository\BasketballPlanningRepository;
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
     * @Route("/basketball/category", name="basketball_category", methods={"GET"})
     * @param Request $request
     * @param BasketballCategoryRepository $categoryRepository
     * @param PaginatorInterface $paginator
     * @return Response
     */
    public function addBasketballCategory(
        Request $request,
        BasketballCategoryRepository $categoryRepository,
        PaginatorInterface $paginator
    ): Response {
        $category = $categoryRepository->findBy([], [
            'id' => 'ASC'
        ]);
        $category = $paginator->paginate(
            $category,
            $request->query->getInt('page', 1),
            10
        );
        return $this->render('admin_section/basketballCategory.html.twig', [
            'basketball_categories' => $category
        ]);
    }

    /**
     * @Route("/basketball/planning", name="basketball_planning", methods={"GET"})
     * @param Request $request
     * @param BasketballPlanningRepository $planningRepository
     * @param PaginatorInterface $paginator
     * @return Response
     */
    public function addBasketballPlanning(
        Request $request,
        BasketballPlanningRepository $planningRepository,
        PaginatorInterface $paginator
    ): Response {
        $planning = $planningRepository->findBy([], [
            'id' => 'ASC'
        ]);
        $planning = $paginator->paginate(
            $planning,
            $request->query->getInt('page', 1),
            10
        );
        return $this->render('admin_section/basketballPlanning.html.twig', [
            'basketball_plannings' => $planning
        ]);
    }
}
