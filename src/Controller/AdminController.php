<?php

namespace App\Controller;

use App\Repository\SectionRepository;
use App\Repository\VerticalHistoryRepository;
use App\Repository\DirigeantsRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
* class AdminController
* @package App\Controller
* @Route("/admin", name="admin_")
*/
class AdminController extends AbstractController
{
    /**
     * @Route("/index", name="index")
     * @return Response
     */
    public function index(): Response
    {
        return $this->render('admin/index.html.twig');
    }

    /**
     * @Route("/homeSection", name="homeSection", methods={"GET"})
     * @param Request $request
     * @param SectionRepository $sectionRepository
     * @param PaginatorInterface $paginator
     * @return Response
     */
    public function homeSection(
        Request $request,
        SectionRepository $sectionRepository,
        PaginatorInterface $paginator
    ): Response {
        $sections = $sectionRepository->findBy([], [
            'titre' => 'ASC'
        ]);
        $sections = $paginator->paginate(
            $sections,
            $request->query->getInt('page', 1),
            10
        );
        return $this->render('admin/homeSection.html.twig', [
            'sections' => $sections
        ]);
    }

    /**
     * @Route("/verticalHistory", name="verticalHistory", methods={"GET"})
     * @param Request $request
     * @param VerticalHistoryRepository $vertHistRepository
     * @param PaginatorInterface $paginator
     * @return Response
     */
    public function verticalHistory(
        Request $request,
        VerticalHistoryRepository $vertHistRepository,
        PaginatorInterface $paginator
    ): Response {
        $verticalHistory = $vertHistRepository->findBy([], [
            'titre' => 'ASC'
        ]);
        $verticalHistory = $paginator->paginate(
            $verticalHistory,
            $request->query->getInt('page', 1),
            10
        );
        return $this->render('admin/verticalHistory.html.twig', [
            'verticalHistorys' => $verticalHistory
        ]);
    }

    /**
     * @Route("/dirigeants", name="dirigeants", methods={"GET"})
     * @param Request $request
     * @param DirigeantsRepository $dirigeantsRepository
     * @param PaginatorInterface $paginator
     * @return Response
     */
    public function dirigeantAsf(
        Request $request,
        DirigeantsRepository $dirigeantsRepository,
        PaginatorInterface $paginator
    ): Response {
        $dirigeants = $dirigeantsRepository->findBy([], [
            'post' => 'ASC'
        ]);
        $dirigeants = $paginator->paginate(
            $dirigeants,
            $request->query->getInt('page', 1),
            10
        );
        return $this->render('admin/dirigeantsAsf.html.twig', [
            'dirigeants' => $dirigeants
        ]);
    }
}
