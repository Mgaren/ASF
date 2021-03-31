<?php

namespace App\Controller;

use App\Entity\President;
use App\Form\PresidentType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/asf/president")
 */
class PresidentController extends AbstractController
{
    /**
     * @Route("/asf/president/new", name="asf_president_new", methods={"GET","POST"})
     * @param Request $request
     * @return Response
     */
    public function new(Request $request): Response
    {
        $president = new President();
        $form = $this->createForm(PresidentType::class, $president);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($president);
            $entityManager->flush();

            return $this->redirectToRoute('admin_president');
        }

        return $this->render('asf/president/new.html.twig', [
            'president' => $president,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/asf/president/show/{id}", name="asf_president_show", methods={"GET"})
     * @param President $president
     * @return Response
     */
    public function show(President $president): Response
    {
        return $this->render('asf/president/show.html.twig', [
            'president' => $president,
        ]);
    }

    /**
     * @Route("/asf/president/edit/{id}", name="asf_president_edit", methods={"GET","POST"})
     * @param Request $request
     * @param President $president
     * @return Response
     */
    public function edit(Request $request, President $president): Response
    {
        $form = $this->createForm(PresidentType::class, $president);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_president');
        }

        return $this->render('asf/president/edit.html.twig', [
            'president' => $president,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/asf/president/delete/{id}", name="asf_president_delete", methods={"DELETE"})
     * @param Request $request
     * @param President $president
     * @param EntityManagerInterface $entityManager
     * @return Response
     */
    public function delete(Request $request, President $president, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $president->getId(), $request->request->get('_token'))) {
            $entityManager->remove($president);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_president');
    }
}
