<?php

namespace App\Controller;

use App\Entity\SectionCategory;
use App\Form\SectionCategoryType;
use App\Repository\SectionCategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/add", name="add_")
 */
class SectionCategoryController extends AbstractController
{
    /**
     * @Route("/section/category/new", name="section_category_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $sectionCategory = new SectionCategory();
        $form = $this->createForm(SectionCategoryType::class, $sectionCategory);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($sectionCategory);
            $entityManager->flush();

            return $this->redirectToRoute('admin_section_category');
        }

        return $this->render('section/section_category/new.html.twig', [
            'section_category' => $sectionCategory,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/section/category/show/{id}", name="section_category_show", methods={"GET"})
     */
    public function show(SectionCategory $sectionCategory): Response
    {
        return $this->render('section/section_category/show.html.twig', [
            'section_category' => $sectionCategory,
        ]);
    }

    /**
     * @Route("/section/category/edit/{id}", name="section_category_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, SectionCategory $sectionCategory): Response
    {
        $form = $this->createForm(SectionCategoryType::class, $sectionCategory);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_section_category');
        }

        return $this->render('section/section_category/edit.html.twig', [
            'section_category' => $sectionCategory,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/section/category/delete/{id}", name="section_category_delete", methods={"DELETE"})
     */
    public function delete(Request $request, SectionCategory $sectionCategory): Response
    {
        if ($this->isCsrfTokenValid('delete' . $sectionCategory->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($sectionCategory);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_section_category');
    }
}
