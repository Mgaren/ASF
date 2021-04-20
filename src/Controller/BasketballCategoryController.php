<?php

namespace App\Controller;

use App\Entity\BasketballCategory;
use App\Form\BasketballCategoryType;
use App\Repository\BasketballCategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/add", name="add_")
 */
class BasketballCategoryController extends AbstractController
{
    /**
     * @Route("/", name="basketball_category_index", methods={"GET"})
     */
    public function index(BasketballCategoryRepository $basketballCategoryRepository): Response
    {
        return $this->render('section/basketball/basketball_category/index.html.twig', [
            'basketball_categories' => $basketballCategoryRepository->findAll(),
        ]);
    }

    /**
     * @Route("/basketball/category/new", name="basketball_category_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $basketballCategory = new BasketballCategory();
        $form = $this->createForm(BasketballCategoryType::class, $basketballCategory);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($basketballCategory);
            $entityManager->flush();

            return $this->redirectToRoute('admin_basketball_category');
        }

        return $this->render('section/basketball/basketball_category/new.html.twig', [
            'basketball_category' => $basketballCategory,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/basketball/category/show/{id}", name="basketball_category_show", methods={"GET"})
     */
    public function show(BasketballCategory $basketballCategory): Response
    {
        return $this->render('section/basketball/basketball_category/show.html.twig', [
            'basketball_category' => $basketballCategory,
        ]);
    }

    /**
     * @Route("/basketball/category/edit/{id}", name="basketball_category_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, BasketballCategory $basketballCategory): Response
    {
        $form = $this->createForm(BasketballCategoryType::class, $basketballCategory);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_basketball_category');
        }

        return $this->render('section/basketball/basketball_category/edit.html.twig', [
            'basketball_category' => $basketballCategory,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/basketball/category/delete/{id}", name="basketball_category_delete", methods={"DELETE"})
     */
    public function delete(Request $request, BasketballCategory $basketballCategory): Response
    {
        if ($this->isCsrfTokenValid('delete' . $basketballCategory->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($basketballCategory);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_basketball_category');
    }
}
