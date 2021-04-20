<?php

namespace App\Controller;

use App\Entity\BasketballPlanning;
use App\Form\BasketballPlanningType;
use App\Repository\BasketballPlanningRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/basketball/planning")
 */
class BasketballPlanningController extends AbstractController
{
    /**
     * @Route("/", name="basketball_planning_index", methods={"GET"})
     */
    public function index(BasketballPlanningRepository $basketballPlanningRepository): Response
    {
        return $this->render('section/basketball/basketball_planning/index.html.twig', [
            'basketball_plannings' => $basketballPlanningRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="basketball_planning_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $basketballPlanning = new BasketballPlanning();
        $form = $this->createForm(BasketballPlanningType::class, $basketballPlanning);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($basketballPlanning);
            $entityManager->flush();

            return $this->redirectToRoute('admin_basketball_planning');
        }

        return $this->render('section/basketball/basketball_planning/new.html.twig', [
            'basketball_planning' => $basketballPlanning,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/show/{id}", name="basketball_planning_show", methods={"GET"})
     */
    public function show(BasketballPlanning $basketballPlanning): Response
    {
        return $this->render('section/basketball/basketball_planning/show.html.twig', [
            'basketball_planning' => $basketballPlanning,
        ]);
    }

    /**
     * @Route("/edit/{id}", name="basketball_planning_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, BasketballPlanning $basketballPlanning): Response
    {
        $form = $this->createForm(BasketballPlanningType::class, $basketballPlanning);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_basketball_planning');
        }

        return $this->render('section/basketball/basketball_planning/edit.html.twig', [
            'basketball_planning' => $basketballPlanning,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/delete/{id}", name="basketball_planning_delete", methods={"DELETE"})
     */
    public function delete(Request $request, BasketballPlanning $basketballPlanning): Response
    {
        if ($this->isCsrfTokenValid('delete' . $basketballPlanning->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($basketballPlanning);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_basketball_planning');
    }
}
