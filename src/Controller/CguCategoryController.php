<?php

namespace App\Controller;

use App\Entity\CguCategory;
use App\Form\CguCategoryType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
  * @Route("/add", name="add_")
  */
class CguCategoryController extends AbstractController
{
    /**
     * @Route("/cgu/category/new", name="cgu_category_new", methods={"GET","POST"})
     * @param Request $request
     * @return Response
     */
    public function new(Request $request): Response
    {
        $cguCategory = new CguCategory();
        $form = $this->createForm(CguCategoryType::class, $cguCategory);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($cguCategory);
            $entityManager->flush();

            return $this->redirectToRoute('admin_cgu_category');
        }

        return $this->render('add/cgu_category/new.html.twig', [
            'cgu_category' => $cguCategory,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/cgu/category/show/{id}", name="cgu_category_show", methods={"GET"})
     * @param CguCategory $cguCategory
     * @return Response
     */
    public function show(CguCategory $cguCategory): Response
    {
        return $this->render('add/cgu_category/show.html.twig', [
            'cgu_category' => $cguCategory,
        ]);
    }

    /**
     * @Route("/cgu/category/edit/{id}", name="cgu_category_edit", methods={"GET","POST"})
     * @param Request $request
     * @param CguCategory $cguCategory
     * @return Response
     */
    public function edit(Request $request, CguCategory $cguCategory): Response
    {
        $form = $this->createForm(CguCategoryType::class, $cguCategory);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_cgu_category');
        }

        return $this->render('add/cgu_category/edit.html.twig', [
            'cgu_category' => $cguCategory,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/cgu/category/delete/{id}", name="cgu_category_delete", methods={"POST"})
     * @param Request $request
     * @param CguCategory $cguCategory
     * @return Response
     */
    public function delete(Request $request, CguCategory $cguCategory): Response
    {
        if ($this->isCsrfTokenValid('delete' . $cguCategory->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($cguCategory);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_cgu_category');
    }
}
