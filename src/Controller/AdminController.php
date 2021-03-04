<?php

namespace App\Controller;

use App\Repository\SectionRepository;
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
            5
        );
        return $this->render('admin/homeSection.html.twig', [
            'sections' => $sections
        ]);
    }
}
