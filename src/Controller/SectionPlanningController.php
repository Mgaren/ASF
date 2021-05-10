<?php

namespace App\Controller;

use App\Entity\SectionCategory;
use App\Entity\SectionPlanning;
use App\Form\SectionPlanningsType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/section/planning")
 */
class SectionPlanningController extends AbstractController
{
    /**
     * @Route("/new", name="section_planning_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $sectionPlanning = new SectionPlanning();
        $form = $this->createForm(SectionPlanningsType::class, $sectionPlanning);
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
        $form = $this->createForm(SectionPlanningsType::class, $sectionPlanning);
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

    /**
     * @Route("/get-categories-from-section", name="section_get_categories", methods={"GET"})
     */
    public function getCategoriesFromSection(Request $request): JsonResponse
    {
        $emi = $this->getDoctrine()->getManager();
        $repoSectionCategory = $emi->getRepository(SectionCategory::class);

        $sectionCategories = $repoSectionCategory->createQueryBuilder("s")
            ->where("s.section = :section_id")
            ->setParameter("section_id", $request->query->get("section_id"))
            ->getQuery()
            ->getResult();

        $responseArray = [];
        foreach ($sectionCategories as $sectionCategory) {
            $responseArray[] = [
                "id" => $sectionCategory->getId(),
                "name" => $sectionCategory->getName()
            ];
        }
        return new JsonResponse($responseArray);
    }
}
