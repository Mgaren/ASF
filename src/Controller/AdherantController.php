<?php

namespace App\Controller;

use App\Entity\AdherantImage;
use App\Form\AdherantImageType;
use App\Repository\AdherantImageRepository;
use App\Entity\AdherantText;
use App\Form\AdherantTextType;
use App\Repository\AdherantTextRepository;
use App\Entity\AdherantPartenaire;
use App\Form\AdherantPartenaireType;
use App\Repository\AdherantPartenaireRepository;
use App\Repository\CategoryRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

/**
 * class AdherantController
 * @package App\Controller
 * @Route("/asf/adherant")
 */
class AdherantController extends AbstractController
{
    /**
     * @Route("/", name="asf_adherant", methods={"GET"})
     * @param AdherantImageRepository $imageRepository
     * @param AdherantTextRepository $textRepository
     * @param AdherantPartenaireRepository $adherantPartenaireR
     * @param CategoryRepository $categoryRepository
     * @return Response
     */
    public function index(
        AdherantImageRepository $imageRepository,
        AdherantTextRepository $textRepository,
        AdherantPartenaireRepository $adherantPartenaireR,
        CategoryRepository $categoryRepository
    ): Response {
        $adherant_partenaires = $adherantPartenaireR->findBy([], [
            'name' => 'ASC'
        ]);
        $partenaires_by_category = [];
        foreach ($adherant_partenaires as $adherant_partenaire) {
            $categoryId = $adherant_partenaire->getCategory()->getId();
            $partenaires_by_category[$categoryId]['categoryName'] = $adherant_partenaire->getCategory()->getName();
            $partenaires_by_category[$categoryId]['partenaires'][] = $adherant_partenaire;
        }

        return$this->render('asf/adherant/index.html.twig', [
            'adherant_images' => $imageRepository->findAll(),
            'adherant_texts' => $textRepository->findAll(),
            'adherant_partenaires_by_category' => $partenaires_by_category,
            'categories' => $categoryRepository->findBy([], [
                'name' => 'ASC'
            ])
        ]);
    }

    //new, show, edit and delete image for adherant page

    /**
     * @Route("/asf/adherant/image/new", name="asf_adherant_image_new", methods={"GET","POST"})
     * @param Request $request
     * @param SluggerInterface $slugger
     * @return Response
     */
    public function newImage(Request $request, SluggerInterface $slugger): Response
    {
        $adherantImage = new AdherantImage();
        $form = $this->createForm(AdherantImageType::class, $adherantImage);
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
                        $this->getParameter('upload_dir_adherant'),
                        $newImageFile
                    );
                } catch (FileException $e) {
                }
                $adherantImage->setImage($newImageFile);
            }
            $entityManager->persist($adherantImage);
            $entityManager->flush();

            return $this->redirectToRoute('admin_adherant');
        }

        return $this->render('asf/adherant/adherant_image/new.html.twig', [
            'adherant_image' => $adherantImage,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/asf/adherant/image/show/{id}", name="asf_adherant_image_show", methods={"GET"})
     * @param AdherantImage $adherantImage
     * @return Response
     */
    public function showImage(AdherantImage $adherantImage): Response
    {
        return $this->render('asf/adherant/adherant_image/show.html.twig', [
            'adherant_image' => $adherantImage,
        ]);
    }

    /**
     * @Route("/asf/adherant/image/edit/{id}", name="asf_adherant_image_edit", methods={"GET","POST"})
     * @param Request $request
     * @param AdherantImage $adherantImage
     * @param SluggerInterface $slugger
     * @return Response
     */
    public function editImage(Request $request, AdherantImage $adherantImage, SluggerInterface $slugger): Response
    {
        $form = $this->createForm(AdherantImageType::class, $adherantImage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $imageFile = $form->get('fileimage')->getData();
            if ($imageFile !== null) {
                $filename = $adherantImage->getImage();
                if ($filename !== '' && is_string($this->getParameter('upload_dir_adherant'))) {
                    $path = $this->getParameter('upload_dir_adherant') . $filename;
                    unlink($path);
                }

                $imageFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFilename = $slugger->slug($imageFilename);
                $newImageFile = $safeImageFilename . '-' . uniqid('', false) . '.' . $imageFile->guessExtension();

                try {
                    $imageFile->move(
                        $this->getParameter('upload_dir_adherant'),
                        $newImageFile
                    );
                } catch (FileException $e) {
                }
                $adherantImage->setImage($newImageFile);
            }
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_adherant');
        }

        return $this->render('asf/adherant/adherant_image/edit.html.twig', [
            'adherant_image' => $adherantImage,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/asf/adherant/image/delete/{id}", name="asf_adherant_image_delete", methods={"DELETE"})
     * @param Request $request
     * @param AdherantImage $adherantImage
     * @param EntityManagerInterface $entityManager
     * @return Response
     */
    public function deleteImage(
        Request $request,
        AdherantImage $adherantImage,
        EntityManagerInterface $entityManager
    ): Response {
        if ($this->isCsrfTokenValid('delete' . $adherantImage->getId(), $request->request->get('_token'))) {
            $filename = $adherantImage->getImage();
            if ($filename !== '' && is_string($this->getParameter('upload_dir_adherant'))) {
                $path = $this->getParameter('upload_dir_adherant') . $filename;
                unlink($path);
            }
            $entityManager->remove($adherantImage);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_adherant');
    }


    //new, show, edit and delete text for adherant page

    /**
     * @Route("/asf/adherant/text/new", name="asf_adherant_text_new", methods={"GET","POST"})
     * @param Request $request
     * @return Response
     */
    public function newText(Request $request): Response
    {
        $adherantText = new AdherantText();
        $form = $this->createForm(AdherantTextType::class, $adherantText);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($adherantText);
            $entityManager->flush();

            return $this->redirectToRoute('admin_adherant');
        }

        return $this->render('asf/adherant/adherant_text/new.html.twig', [
            'adherant_text' => $adherantText,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/asf/adherant/text/show/{id}", name="asf_adherant_text_show", methods={"GET"})
     * @param AdherantText $adherantText
     * @return Response
     */
    public function showText(AdherantText $adherantText): Response
    {
        return $this->render('asf/adherant/adherant_text/show.html.twig', [
            'adherant_text' => $adherantText,
        ]);
    }

    /**
     * @Route("/asf/adherant/text/edit/{id}", name="asf_adherant_text_edit", methods={"GET","POST"})
     * @param Request $request
     * @param AdherantText $adherantText
     * @return Response
     */
    public function editText(Request $request, AdherantText $adherantText): Response
    {
        $form = $this->createForm(AdherantTextType::class, $adherantText);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_adherant');
        }

        return $this->render('asf/adherant/adherant_text/edit.html.twig', [
            'adherant_text' => $adherantText,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/asf/adherant/text/delete/{id}", name="asf_adherant_text_delete", methods={"DELETE"})
     * @param Request $request
     * @param AdherantText $adherantText
     * @param EntityManagerInterface $entityManager
     * @return Response
     */
    public function deleteText(
        Request $request,
        AdherantText $adherantText,
        EntityManagerInterface $entityManager
    ): Response {
        if ($this->isCsrfTokenValid('delete' . $adherantText->getId(), $request->request->get('_token'))) {
            $entityManager->remove($adherantText);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_adherant');
    }

    //new, show, edit and delete partenaire for adherant page

    /**
     * @Route("/asf/adherant/partenaire/new", name="asf_adherant_partenaire_new", methods={"GET","POST"})
     * @param Request $request
     * @param SluggerInterface $slugger
     * @return Response
     */
    public function new(Request $request, SluggerInterface $slugger): Response
    {
        $adherantPartenaire = new AdherantPartenaire();
        $form = $this->createForm(AdherantPartenaireType::class, $adherantPartenaire);
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
                        $this->getParameter('upload_dir_adherant'),
                        $newImageFile
                    );
                } catch (FileException $e) {
                }
                $adherantPartenaire->setImage($newImageFile);
            }
            $entityManager->persist($adherantPartenaire);
            $entityManager->flush();

            return $this->redirectToRoute('admin_adherant');
        }

        return $this->render('asf/adherant/adherant_partenaire/new.html.twig', [
            'adherant_partenaire' => $adherantPartenaire,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/asf/adherant/partenaire/show/{id}", name="asf_adherant_partenaire_show", methods={"GET"})
     * @param AdherantPartenaire $adherantPartenaire
     * @return Response
     */
    public function show(AdherantPartenaire $adherantPartenaire): Response
    {
        return $this->render('asf/adherant/adherant_partenaire/show.html.twig', [
            'adherant_partenaire' => $adherantPartenaire,
        ]);
    }

    /**
     * @Route("/asf/adherant/partenaire/edit/{id}", name="asf_adherant_partenaire_edit", methods={"GET","POST"})
     * @param Request $request
     * @param AdherantPartenaire $adherantPartenaire
     * @param SluggerInterface $slugger
     * @return Response
     */
    public function edit(Request $request, AdherantPartenaire $adherantPartenaire, SluggerInterface $slugger): Response
    {
        $form = $this->createForm(AdherantPartenaireType::class, $adherantPartenaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $imageFile = $form->get('fileimage')->getData();
            if ($imageFile !== null) {
                $filename = $adherantPartenaire->getImage();
                if ($filename !== '' && is_string($this->getParameter('upload_dir_adherant'))) {
                    $path = $this->getParameter('upload_dir_adherant') . $filename;
                    unlink($path);
                }
                $imageFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFilename = $slugger->slug($imageFilename);
                $newImageFile = $safeImageFilename . '-' . uniqid('', false) . '.' . $imageFile->guessExtension();

                try {
                    $imageFile->move(
                        $this->getParameter('upload_dir_adherant'),
                        $newImageFile
                    );
                } catch (FileException $e) {
                }
                $adherantPartenaire->setImage($newImageFile);
            }
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_adherant');
        }

        return $this->render('asf/adherant/adherant_partenaire/edit.html.twig', [
            'adherant_partenaire' => $adherantPartenaire,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/asf/adherant/partenaire/delete/{id}", name="asf_adherant_partenaire_delete", methods={"DELETE"})
     * @param Request $request
     * @param AdherantPartenaire $adherantPartenaire
     * @param EntityManagerInterface $entityManager
     * @return Response
     */
    public function delete(
        Request $request,
        AdherantPartenaire $adherantPartenaire,
        EntityManagerInterface $entityManager
    ): Response {
        if ($this->isCsrfTokenValid('delete' . $adherantPartenaire->getId(), $request->request->get('_token'))) {
            $filename = $adherantPartenaire->getImage();
            if ($filename !== '' && is_string($this->getParameter('upload_dir_adherant'))) {
                $path = $this->getParameter('upload_dir_adherant') . $filename;
                unlink($path);
            }
            $entityManager->remove($adherantPartenaire);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_adherant');
    }
}
