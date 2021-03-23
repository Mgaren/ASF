<?php

namespace App\Controller;

use App\Entity\DirigeantsPost;
use App\Form\DirigeantsPostType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/add", name="add_")
 */
class DirigeantsPostController extends AbstractController
{
    /**
     * @Route("/dirigeants/post/new", name="dirigeants_post_new", methods={"GET","POST"})
     * @param Request $request
     * @return Response
     */
    public function new(Request $request): Response
    {
        $dirigeantsPost = new DirigeantsPost();
        $form = $this->createForm(DirigeantsPostType::class, $dirigeantsPost);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($dirigeantsPost);
            $entityManager->flush();

            return $this->redirectToRoute('admin_dirigeants_post');
        }

        return $this->render('add/post/new.html.twig', [
            'dirigeants_post' => $dirigeantsPost,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/dirigeants/post/show/{id}", name="dirigeants_post_show", methods={"GET"})
     * @param DirigeantsPost $dirigeantsPost
     * @return Response
     */
    public function show(DirigeantsPost $dirigeantsPost): Response
    {
        return $this->render('add/post/show.html.twig', [
            'dirigeants_post' => $dirigeantsPost,
        ]);
    }

    /**
     * @Route("/dirigeants/post/edit/{id}", name="dirigeants_post_edit", methods={"GET","POST"})
     * @param Request $request
     * @param DirigeantsPost $dirigeantsPost
     * @return Response
     */
    public function edit(Request $request, DirigeantsPost $dirigeantsPost): Response
    {
        $form = $this->createForm(DirigeantsPostType::class, $dirigeantsPost);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_dirigeants_post');
        }

        return $this->render('add/post/edit.html.twig', [
            'dirigeants_post' => $dirigeantsPost,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/dirigeants/post/delete/{id}", name="dirigeants_post_delete", methods={"DELETE"})
     * @param Request $request
     * @param DirigeantsPost $dirigeantsPost
     * @return Response
     */
    public function delete(Request $request, DirigeantsPost $dirigeantsPost): Response
    {
        if ($this->isCsrfTokenValid('delete' . $dirigeantsPost->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($dirigeantsPost);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_dirigeants_post');
    }
}
