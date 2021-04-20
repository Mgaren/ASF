<?php

namespace App\Controller;

use App\Entity\Section;
use App\Form\SectionType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/add", name="add_")
 */
class SectionController extends AbstractController
{
    /**
     * @Route("/section/new", name="section_new", methods={"GET","POST"})
     * @param Request $request
     * @return Response
     */
    public function new(Request $request): Response
    {
        $section = new Section();
        $form = $this->createForm(SectionType::class, $section);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($section);
            $entityManager->flush();

            return $this->redirectToRoute('admin_section');
        }

        return $this->render('add/section/new.html.twig', [
            'section' => $section,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/section/show/{id}", name="section_show", methods={"GET"})
     * @param Section $section
     * @return Response
     */
    public function show(Section $section): Response
    {
        return $this->render('add/section/show.html.twig', [
            'section' => $section,
        ]);
    }

    /**
     * @Route("/section/edit/{id}", name="section_edit", methods={"GET","POST"})
     * @param Request $request
     * @param Section $section
     * @return Response
     */
    public function edit(Request $request, Section $section): Response
    {
        $form = $this->createForm(SectionType::class, $section);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_section');
        }

        return $this->render('add/section/edit.html.twig', [
            'section' => $section,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="section_delete", methods={"POST"})
     * @param Request $request
     * @param Section $section
     * @return Response
     */
    public function delete(Request $request, Section $section): Response
    {
        if ($this->isCsrfTokenValid('delete' . $section->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($section);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_section');
    }
}
