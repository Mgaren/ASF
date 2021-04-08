<?php

namespace App\Controller;

use App\Entity\Date;
use App\Form\DateType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/add", name="add_")
 */
class DateController extends AbstractController
{
    /**
     * @Route("/date/new", name="date_new", methods={"GET","POST"})
     * @param Request $request
     * @return Response
     */
    public function new(Request $request): Response
    {
        $date = new Date();
        $form = $this->createForm(DateType::class, $date);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($date);
            $entityManager->flush();

            return $this->redirectToRoute('admin_date');
        }

        return $this->render('add/date/new.html.twig', [
            'date' => $date,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/date/show/{id}", name="date_show", methods={"GET"})
     * @param Date $date
     * @return Response
     */
    public function show(Date $date): Response
    {
        return $this->render('add/date/show.html.twig', [
            'date' => $date,
        ]);
    }

    /**
     * @Route("/date/edit/{id}", name="date_edit", methods={"GET","POST"})
     * @param Request $request
     * @param Date $date
     * @return Response
     */
    public function edit(Request $request, Date $date): Response
    {
        $form = $this->createForm(DateType::class, $date);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_date');
        }

        return $this->render('add/date/edit.html.twig', [
            'date' => $date,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/date/delete/{id}", name="date_delete", methods={"DELETE"})
     * @param Request $request
     * @param Date $date
     * @return Response
     */
    public function delete(Request $request, Date $date): Response
    {
        if ($this->isCsrfTokenValid('delete' . $date->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($date);
            $entityManager->flush();
        }

        return $this->redirectToRoute('date_index');
    }
}
