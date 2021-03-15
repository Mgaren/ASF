<?php

namespace App\Controller;

use App\Entity\Dirigeants;
use App\Form\DirigeantsType;
use App\Repository\DirigeantsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

/**
 * Class DirigeantsController
 * @package App\Controller
 * @Route("/asf/dirigeants")
 */
class DirigeantsController extends AbstractController
{
    /**
     * @Route("/", name="asf_dirigeants", methods={"GET"})
     * @param DirigeantsRepository $dirigeantsRepository
     * @return Response
     */
    public function index(DirigeantsRepository $dirigeantsRepository): Response
    {
        return $this->render('asf/dirigeants/index.html.twig', [
            'dirigeants' => $dirigeantsRepository->findBy([], [
                'post' => 'ASC'
            ]),
        ]);
    }

    /**
     * @Route("/asf/dirigeants/new", name="asf_dirigeants_new", methods={"GET","POST"})
     * @param Request $request
     * @param SluggerInterface $slugger
     * @return Response
     */
    public function new(Request $request, SluggerInterface $slugger): Response
    {
        $dirigeant = new Dirigeants();
        $form = $this->createForm(DirigeantsType::class, $dirigeant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $imageFile = $form->get('fileimage')->getData();
            if ($imageFile) {
                $imageFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFilename = $slugger->slug($imageFilename);
                $newImageFile = $safeImageFilename . '-' . uniqid('', false) . '.' . $imageFile->guessExtension();

                try {
                    $imageFile->move(
                        $this->getParameter('upload_dir_dirigeants'),
                        $newImageFile
                    );
                } catch (FileException $e) {
                }
            }
            $entityManager->persist($dirigeant);
            $entityManager->flush();

            return $this->redirectToRoute('admin_dirigeants');
        }

        return $this->render('asf/dirigeants/new.html.twig', [
            'dirigeant' => $dirigeant,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/asf/dirigeants/show/{id}", name="asf_dirigeants_show", methods={"GET"})
     * @param Dirigeants $dirigeant
     * @return Response
     */
    public function show(Dirigeants $dirigeant): Response
    {
        return $this->render('asf/dirigeants/show.html.twig', [
            'dirigeant' => $dirigeant,
        ]);
    }

    /**
     * @Route("/asf/dirigeants/edit/{id}", name="asf_dirigeants_edit", methods={"GET","POST"})
     * @param Request $request
     * @param Dirigeants $dirigeant
     * @return Response
     */
    public function edit(Request $request, Dirigeants $dirigeant): Response
    {
        $form = $this->createForm(DirigeantsType::class, $dirigeant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_dirigeants');
        }

        return $this->render('asf/dirigeants/edit.html.twig', [
            'dirigeant' => $dirigeant,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/asf/dirigeants/delete/{id}", name="asf_dirigeants_delete", methods={"DELETE"})
     * @param Request $request
     * @param Dirigeants $dirigeant
     * @param EntityManagerInterface $entityManager
     * @return Response
     */
    public function delete(Request $request, Dirigeants $dirigeant, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $dirigeant->getId(), $request->request->get('_token'))) {
            $filename = $dirigeant->getImage();
            if ($filename !== '' && is_string($this->getParameter('upload_dir_dirigeants'))) {
                $path = $this->getParameter('upload_dir_dirigeants') . $filename;
                unlink($path);
            }
            $entityManager->remove($dirigeant);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_dirigeants');
    }
}
