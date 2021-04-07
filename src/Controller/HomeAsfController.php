<?php

namespace App\Controller;

use App\Entity\HomeAsf;
use App\Form\HomeAsfType;
use App\Repository\HomeAsfRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

/**
 * Class HomeAsfController
 * @package App\Controller
 */
class HomeAsfController extends AbstractController
{
    /**
     * @param HomeAsfRepository $homeAsfRepository
     * @return Response
     * @Route("/asf", name="asf", methods={"GET"})
     */
    public function index(HomeAsfRepository $homeAsfRepository): Response
    {
        return $this->render('asf/index.html.twig', [
            'home_asfs' => $homeAsfRepository->findAll(),
        ]);
    }

    /**
     * @Route("/asf/new", name="asf_new", methods={"GET","POST"})
     * @param Request $request
     * @param SluggerInterface $slugger
     * @return Response
     */
    public function new(Request $request, SluggerInterface $slugger): Response
    {
        $homeAsf = new HomeAsf();
        $form = $this->createForm(HomeAsfType::class, $homeAsf);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $imageFile1 = $form->get('fileimage1')->getData();
            $imageFile2 = $form->get('fileimage2')->getData();
            $imageFile3 = $form->get('fileimage3')->getData();
            $imageFile4 = $form->get('fileimage4')->getData();
            $imageFile5 = $form->get('fileimage5')->getData();
            if ($imageFile1) {
                $imageFile1name = pathinfo($imageFile1->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile1name = $slugger->slug($imageFile1name);
                $newImageFile1 = $safeImageFile1name . '-' . uniqid('', false) . '.' . $imageFile1->guessExtension();

                try {
                    $imageFile1->move(
                        $this->getParameter('upload_dir_homeAsf'),
                        $newImageFile1
                    );
                } catch (FileException $e) {
                }
                $homeAsf->setImage1($newImageFile1);
            }
            if ($imageFile2) {
                $imageFile2name = pathinfo($imageFile2->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile2name = $slugger->slug($imageFile2name);
                $newImageFile2 = $safeImageFile2name . '-' . uniqid('', false) . '.' . $imageFile2->guessExtension();

                try {
                    $imageFile2->move(
                        $this->getParameter('upload_dir_homeAsf'),
                        $newImageFile2
                    );
                } catch (FileException $e) {
                }
                $homeAsf->setImage2($newImageFile2);
            }
            if ($imageFile3) {
                $imageFile3name = pathinfo($imageFile3->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile3name = $slugger->slug($imageFile3name);
                $newImageFile3 = $safeImageFile3name . '-' . uniqid('', false) . '.' . $imageFile3->guessExtension();

                try {
                    $imageFile3->move(
                        $this->getParameter('upload_dir_homeAsf'),
                        $newImageFile3
                    );
                } catch (FileException $e) {
                }
                $homeAsf->setImage3($newImageFile3);
            }
            if ($imageFile4) {
                $imageFile4name = pathinfo($imageFile4->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile4name = $slugger->slug($imageFile4name);
                $newImageFile4 = $safeImageFile4name . '-' . uniqid('', false) . '.' . $imageFile4->guessExtension();

                try {
                    $imageFile4->move(
                        $this->getParameter('upload_dir_homeAsf'),
                        $newImageFile4
                    );
                } catch (FileException $e) {
                }
                $homeAsf->setImage4($newImageFile4);
            }
            if ($imageFile5) {
                $imageFile5name = pathinfo($imageFile5->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile5name = $slugger->slug($imageFile5name);
                $newImageFile5 = $safeImageFile5name . '-' . uniqid('', false) . '.' . $imageFile5->guessExtension();

                try {
                    $imageFile5->move(
                        $this->getParameter('upload_dir_homeAsf'),
                        $newImageFile5
                    );
                } catch (FileException $e) {
                }
                $homeAsf->setImage5($newImageFile5);
            }
            $entityManager->persist($homeAsf);
            $entityManager->flush();

            return $this->redirectToRoute('admin_homeAsf');
        }

        return $this->render('asf/home/new.html.twig', [
            'home_asf' => $homeAsf,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/asf/show/{id}", name="asf_show", methods={"GET"})
     * @param HomeAsf $homeAsf
     * @return Response
     */
    public function show(HomeAsf $homeAsf): Response
    {
        return $this->render('asf/home/show.html.twig', [
            'home_asf' => $homeAsf,
        ]);
    }

    /**
     * @Route("/asf/edit/{id}", name="asf_edit", methods={"GET","POST"})
     * @param Request $request
     * @param HomeAsf $homeAsf
     * @param SluggerInterface $slugger
     * @return Response
     */
    public function edit(Request $request, HomeAsf $homeAsf, SluggerInterface $slugger): Response
    {
        $form = $this->createForm(HomeAsfType::class, $homeAsf);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $imageFile1 = $form->get('fileimage1')->getData();
            $imageFile2 = $form->get('fileimage2')->getData();
            $imageFile3 = $form->get('fileimage3')->getData();
            $imageFile4 = $form->get('fileimage4')->getData();
            $imageFile5 = $form->get('fileimage5')->getData();
            if ($imageFile1 !== null) {
                $filename1 = $homeAsf->getImage1();
                if ($filename1 !== '' && is_string($this->getParameter('upload_dir_homeAsf'))) {
                    $path = $this->getParameter('upload_dir_homeAsf') . $filename1;
                    unlink($path);
                }
                $imageFile1name = pathinfo($imageFile1->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile1name = $slugger->slug($imageFile1name);
                $newImageFile1 = $safeImageFile1name . '-' . uniqid('', false) . '.' . $imageFile1->guessExtension();

                try {
                    $imageFile1->move(
                        $this->getParameter('upload_dir_homeAsf'),
                        $newImageFile1
                    );
                } catch (FileException $e) {
                }
                $homeAsf->setImage1($newImageFile1);
            }
            if ($imageFile2 !== null) {
                $filename2 = $homeAsf->getImage2();
                if ($filename2 !== '' && is_string($this->getParameter('upload_dir_homeAsf'))) {
                    $path = $this->getParameter('upload_dir_homeAsf') . $filename2;
                    unlink($path);
                }
                $imageFile2name = pathinfo($imageFile2->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile2name = $slugger->slug($imageFile2name);
                $newImageFile2 = $safeImageFile2name . '-' . uniqid('', false) . '.' . $imageFile2->guessExtension();

                try {
                    $imageFile2->move(
                        $this->getParameter('upload_dir_homeAsf'),
                        $newImageFile2
                    );
                } catch (FileException $e) {
                }
                $homeAsf->setImage2($newImageFile2);
            }
            if ($imageFile3 !== null) {
                $filename3 = $homeAsf->getImage3();
                if ($filename3 !== '' && is_string($this->getParameter('upload_dir_homeAsf'))) {
                    $path = $this->getParameter('upload_dir_homeAsf') . $filename3;
                    unlink($path);
                }
                $imageFile3name = pathinfo($imageFile3->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile3name = $slugger->slug($imageFile3name);
                $newImageFile3 = $safeImageFile3name . '-' . uniqid('', false) . '.' . $imageFile3->guessExtension();

                try {
                    $imageFile3->move(
                        $this->getParameter('upload_dir_homeAsf'),
                        $newImageFile3
                    );
                } catch (FileException $e) {
                }
                $homeAsf->setImage3($newImageFile3);
            }
            if ($imageFile4 !== null) {
                $filename4 = $homeAsf->getImage4();
                if ($filename4 !== '' && is_string($this->getParameter('upload_dir_homeAsf'))) {
                    $path = $this->getParameter('upload_dir_homeAsf') . $filename4;
                    unlink($path);
                }
                $imageFile4name = pathinfo($imageFile4->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile4name = $slugger->slug($imageFile4name);
                $newImageFile4 = $safeImageFile4name . '-' . uniqid('', false) . '.' . $imageFile4->guessExtension();

                try {
                    $imageFile4->move(
                        $this->getParameter('upload_dir_homeAsf'),
                        $newImageFile4
                    );
                } catch (FileException $e) {
                }
                $homeAsf->setImage4($newImageFile4);
            }
            if ($imageFile5 !== null) {
                $filename5 = $homeAsf->getImage5();
                if ($filename5 !== '' && is_string($this->getParameter('upload_dir_homeAsf'))) {
                    $path = $this->getParameter('upload_dir_homeAsf') . $filename5;
                    unlink($path);
                }
                $imageFile5name = pathinfo($imageFile5->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile5name = $slugger->slug($imageFile5name);
                $newImageFile5 = $safeImageFile5name . '-' . uniqid('', false) . '.' . $imageFile5->guessExtension();

                try {
                    $imageFile5->move(
                        $this->getParameter('upload_dir_homeAsf'),
                        $newImageFile5
                    );
                } catch (FileException $e) {
                }
                $homeAsf->setImage5($newImageFile5);
            }
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_homeAsf');
        }

        return $this->render('asf/home/edit.html.twig', [
            'home_asf' => $homeAsf,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/asf/delete/{id}", name="asf_delete", methods={"DELETE"})
     * @param Request $request
     * @param HomeAsf $homeAsf
     * @param EntityManagerInterface $entityManager
     * @return Response
     */
    public function delete(Request $request, HomeAsf $homeAsf, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $homeAsf->getId(), $request->request->get('_token'))) {
            $filename1 = $homeAsf->getImage1();
            if ($filename1 !== '' && is_string($this->getParameter('upload_dir_homeAsf'))) {
                $path = $this->getParameter('upload_dir_homeAsf') . $filename1;
                unlink($path);
            }
            $filename2 = $homeAsf->getImage2();
            if ($filename2 !== '' && is_string($this->getParameter('upload_dir_homeAsf'))) {
                $path = $this->getParameter('upload_dir_homeAsf') . $filename2;
                unlink($path);
            }
            $filename3 = $homeAsf->getImage3();
            if ($filename3 !== '' && is_string($this->getParameter('upload_dir_homeAsf'))) {
                $path = $this->getParameter('upload_dir_homeAsf') . $filename3;
                unlink($path);
            }
            $filename4 = $homeAsf->getImage4();
            if ($filename4 !== '' && is_string($this->getParameter('upload_dir_homeAsf'))) {
                $path = $this->getParameter('upload_dir_homeAsf') . $filename4;
                unlink($path);
            }
            $filename5 = $homeAsf->getImage5();
            if ($filename5 !== '' && is_string($this->getParameter('upload_dir_homeAsf'))) {
                $path = $this->getParameter('upload_dir_homeAsf') . $filename5;
                unlink($path);
            }

            $entityManager->remove($homeAsf);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_homeAsf');
    }
}
