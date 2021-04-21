<?php

namespace App\Controller;

use App\Entity\Cgu;
use App\Form\CguType;
use App\Repository\CguRepository;
use App\Repository\ItemRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/cgu")
 */
class CguController extends AbstractController
{
    /**
     * @Route("/", name="cgu", methods={"GET"})
     * @param CguRepository $cguRepository
     * @param ItemRepository $itemRepository
     * @return Response
     */
    public function index(CguRepository $cguRepository, ItemRepository $itemRepository): Response
    {
        /*$items = $itemRepository->findAll();
        $item_by_category = [];
        foreach ($items as $item) {
            $itemId = $item->getCguCategory()->getId();
            $item_by_category[$itemId]['cguCategory'] = $item->getCguCategory()->getName();
            $item_by_category[$itemId]['items'][] = $item;
        }*/

        return $this->render('cgu/index.html.twig', [
            'cgus' => $cguRepository->findAll(),
            'items' => $itemRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="cgu_new", methods={"GET","POST"})
     * @param Request $request
     * @return Response
     */
    public function new(Request $request): Response
    {
        $cgu = new Cgu();
        $form = $this->createForm(CguType::class, $cgu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($cgu);
            $entityManager->flush();

            return $this->redirectToRoute('admin_cgu');
        }

        return $this->render('cgu/new.html.twig', [
            'cgu' => $cgu,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/show/{id}", name="cgu_show", methods={"GET"})
     * @param Cgu $cgu
     * @return Response
     */
    public function show(Cgu $cgu): Response
    {
        return $this->render('cgu/show.html.twig', [
            'cgu' => $cgu,
        ]);
    }

    /**
     * @Route("/edit/{id}", name="cgu_edit", methods={"GET","POST"})
     * @param Request $request
     * @param Cgu $cgu
     * @return Response
     */
    public function edit(Request $request, Cgu $cgu): Response
    {
        $form = $this->createForm(CguType::class, $cgu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_cgu');
        }

        return $this->render('cgu/edit.html.twig', [
            'cgu' => $cgu,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/delete/{id}", name="cgu_delete", methods={"POST"})
     * @param Request $request
     * @param Cgu $cgu
     * @return Response
     */
    public function delete(Request $request, Cgu $cgu): Response
    {
        if ($this->isCsrfTokenValid('delete' . $cgu->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($cgu);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_cgu');
    }
}
