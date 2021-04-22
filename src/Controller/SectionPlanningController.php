<?php

namespace App\Controller;

use App\Entity\SectionPlanning;
use App\Form\SectionPlanningType;
use App\Repository\SectionPlanningRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/section/planning")
 */
class SectionPlanningController extends AbstractController
{
    /**
     * @Route("/", name="section_planning_index", methods={"GET"})
     */
    public function index(SectionPlanningRepository $sectionPlanning): Response
    {
        return $this->render('section/section_planning/index.html.twig', [
            'section_plannings' => $sectionPlanning->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="section_planning_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $sectionPlanning = new SectionPlanning();
        $form = $this->createForm(SectionPlanningType::class, $sectionPlanning);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($sectionPlanning);
            $entityManager->flush();

            return $this->redirectToRoute('admin_section_planning');
        }

        return $this->render('section/section_planning/new.html.twig', [
            'section_planning' => $sectionPlanning,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/show/{id}", name="section_planning_show", methods={"GET"})
     */
    public function show(SectionPlanning $sectionPlanning): Response
    {
        return $this->render('section/section_planning/show.html.twig', [
            'section_planning' => $sectionPlanning,
        ]);
    }

    /**
     * @Route("/edit/{id}", name="section_planning_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, SectionPlanning $sectionPlanning): Response
    {
        $form = $this->createForm(SectionPlanningType::class, $sectionPlanning);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_section_planning');
        }

        return $this->render('section/section_planning/edit.html.twig', [
            'section_planning' => $sectionPlanning,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/delete/{id}", name="section_planning_delete", methods={"DELETE"})
     */
    public function delete(Request $request, SectionPlanning $sectionPlanning): Response
    {
        if ($this->isCsrfTokenValid('delete' . $sectionPlanning->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($sectionPlanning);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_section_planning');
    }
}
