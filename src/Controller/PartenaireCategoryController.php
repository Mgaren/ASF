<?php

namespace App\Controller;

use App\Entity\PartenaireCategory;
use App\Form\PartenaireCategoryType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/add", name="add_")
 */
class PartenaireCategoryController extends AbstractController
{
    /**
     * @Route("/partenaireCategory/new", name="partenaire_category_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $partenaireCategory = new PartenaireCategory();
        $form = $this->createForm(PartenaireCategoryType::class, $partenaireCategory);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($partenaireCategory);
            $entityManager->flush();

            return $this->redirectToRoute('admin_partenaire_category');
        }

        return $this->render('add/partenaire_category/new.html.twig', [
            'partenaire_category' => $partenaireCategory,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/partenaireCategory/show/{id}", name="partenaire_category_show", methods={"GET"})
     */
    public function show(PartenaireCategory $partenaireCategory): Response
    {
        return $this->render('add/partenaire_category/show.html.twig', [
            'partenaire_category' => $partenaireCategory,
        ]);
    }

    /**
     * @Route("/partenaireCategory/edit/{id}", name="partenaire_category_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, PartenaireCategory $partenaireCategory): Response
    {
        $form = $this->createForm(PartenaireCategoryType::class, $partenaireCategory);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_partenaire_category');
        }

        return $this->render('add/partenaire_category/edit.html.twig', [
            'partenaire_category' => $partenaireCategory,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/partenaireCategory/delete/{id}", name="partenaire_category_delete", methods={"DELETE"})
     */
    public function delete(Request $request, PartenaireCategory $partenaireCategory): Response
    {
        if ($this->isCsrfTokenValid('delete' . $partenaireCategory->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($partenaireCategory);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_partenaire_category');
    }
}
