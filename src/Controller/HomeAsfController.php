<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class HomeController
 * @package App\Controller
 */
class HomeAsfController extends AbstractController
{
    /**
     * @return Response
     * @Route("/asf", name="asf")
     */
    public function index(): Response
    {
        return $this->render('asf/index.html.twig');
    }
}
