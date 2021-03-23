<?php

namespace App\Controller;

use App\Entity\SectionSalary;
use App\Form\SectionSalaryType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/add", name="add_")
 */
class SectionSalaryController extends AbstractController
{
    /**
     * @Route("/section/salary/new", name="section_salary_new", methods={"GET","POST"})
     * @param Request $request
     * @return Response
     */
    public function new(Request $request): Response
    {
        $sectionSalary = new SectionSalary();
        $form = $this->createForm(SectionSalaryType::class, $sectionSalary);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($sectionSalary);
            $entityManager->flush();

            return $this->redirectToRoute('admin_section_salary');
        }

        return $this->render('add/section/new.html.twig', [
            'section_salary' => $sectionSalary,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/section/salary/show/{id}", name="section_salary_show", methods={"GET"})
     * @param SectionSalary $sectionSalary
     * @return Response
     */
    public function show(SectionSalary $sectionSalary): Response
    {
        return $this->render('add/section/show.html.twig', [
            'section_salary' => $sectionSalary,
        ]);
    }

    /**
     * @Route("/section/salary/edit/{id}", name="section_salary_edit", methods={"GET","POST"})
     * @param Request $request
     * @param SectionSalary $sectionSalary
     * @return Response
     */
    public function edit(Request $request, SectionSalary $sectionSalary): Response
    {
        $form = $this->createForm(SectionSalaryType::class, $sectionSalary);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_section_salary');
        }

        return $this->render('add/section/edit.html.twig', [
            'section_salary' => $sectionSalary,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/section/salary/delete/{id}", name="section_salary_delete", methods={"DELETE"})
     * @param Request $request
     * @param SectionSalary $sectionSalary
     * @return Response
     */
    public function delete(Request $request, SectionSalary $sectionSalary): Response
    {
        if ($this->isCsrfTokenValid('delete' . $sectionSalary->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($sectionSalary);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_section_salary');
    }
}
