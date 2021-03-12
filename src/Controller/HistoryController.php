<?php

namespace App\Controller;

use App\Entity\VerticalHistory;
use App\Form\VerticalHistoryType;
use App\Repository\VerticalHistoryRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

/**
 * Class VerticalHistoryController
 * @package App\Controller
 * @Route("/asf/history/history")
 */
class HistoryController extends AbstractController
{
    /**
     * @return Response
     * @Route("/", name="asf_history_history", methods={"GET"})
     */
    public function index(): Response
    {
        return $this->render('asf/history/index.html.twig');
    }
}
