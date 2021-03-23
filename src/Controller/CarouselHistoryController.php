<?php

namespace App\Controller;

use App\Entity\CarouselHistory;
use App\Form\CarouselHistoryType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

/**
 * @Route("/home")
 */
class CarouselHistoryController extends AbstractController
{
    /**
     * @Route("/home/carousel/history/new", name="home_carousel_history_new", methods={"GET","POST"})
     * @param Request $request
     * @param SluggerInterface $slugger
     * @return Response
     */
    public function new(Request $request, SluggerInterface $slugger): Response
    {
        $carouselHistory = new CarouselHistory();
        $form = $this->createForm(CarouselHistoryType::class, $carouselHistory);
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
                        $this->getParameter('upload_dir_carouselHistory'),
                        $newImageFile1
                    );
                } catch (FileException $e) {
                }
                $carouselHistory->setImage1($newImageFile1);
            }
            if ($imageFile2) {
                $imageFile2name = pathinfo($imageFile2->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile2name = $slugger->slug($imageFile2name);
                $newImageFile2 = $safeImageFile2name . '-' . uniqid('', false) . '.' . $imageFile2->guessExtension();

                try {
                    $imageFile2->move(
                        $this->getParameter('upload_dir_carouselHistory'),
                        $newImageFile2
                    );
                } catch (FileException $e) {
                }
                $carouselHistory->setImage2($newImageFile2);
            }
            if ($imageFile3) {
                $imageFile3name = pathinfo($imageFile3->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile3name = $slugger->slug($imageFile3name);
                $newImageFile3 = $safeImageFile3name . '-' . uniqid('', false) . '.' . $imageFile3->guessExtension();

                try {
                    $imageFile3->move(
                        $this->getParameter('upload_dir_carouselHistory'),
                        $newImageFile3
                    );
                } catch (FileException $e) {
                }
                $carouselHistory->setImage3($newImageFile3);
            }
            if ($imageFile4) {
                $imageFile4name = pathinfo($imageFile4->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile4name = $slugger->slug($imageFile4name);
                $newImageFile4 = $safeImageFile4name . '-' . uniqid('', false) . '.' . $imageFile4->guessExtension();

                try {
                    $imageFile4->move(
                        $this->getParameter('upload_dir_carouselHistory'),
                        $newImageFile4
                    );
                } catch (FileException $e) {
                }
                $carouselHistory->setImage4($newImageFile4);
            }
            if ($imageFile5) {
                $imageFile5name = pathinfo($imageFile5->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile5name = $slugger->slug($imageFile5name);
                $newImageFile5 = $safeImageFile5name . '-' . uniqid('', false) . '.' . $imageFile5->guessExtension();

                try {
                    $imageFile5->move(
                        $this->getParameter('upload_dir_carouselHistory'),
                        $newImageFile5
                    );
                } catch (FileException $e) {
                }
                $carouselHistory->setImage5($newImageFile5);
            }
            $entityManager->persist($carouselHistory);
            $entityManager->flush();

            return $this->redirectToRoute('admin_carousel_history');
        }

        return $this->render('home/carousel_history/new.html.twig', [
            'carousel_history' => $carouselHistory,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/home/carousel/history/show/{id}", name="home_carousel_history_show", methods={"GET"})
     * @param CarouselHistory $carouselHistory
     * @return Response
     */
    public function show(CarouselHistory $carouselHistory): Response
    {
        return $this->render('home/carousel_history/show.html.twig', [
            'carousel_history' => $carouselHistory,
        ]);
    }

    /**
     * @Route("/home/carousel/history/edit/{id}", name="home_carousel_history_edit", methods={"GET","POST"})
     * @param Request $request
     * @param CarouselHistory $carouselHistory
     * @param SluggerInterface $slugger
     * @return Response
     */
    public function edit(Request $request, CarouselHistory $carouselHistory, SluggerInterface $slugger): Response
    {
        $form = $this->createForm(CarouselHistoryType::class, $carouselHistory);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $imageFile1 = $form->get('fileimage1')->getData();
            $imageFile2 = $form->get('fileimage2')->getData();
            $imageFile3 = $form->get('fileimage3')->getData();
            $imageFile4 = $form->get('fileimage4')->getData();
            $imageFile5 = $form->get('fileimage5')->getData();
            if ($imageFile1 !== null) {
                $filename1 = $carouselHistory->getImage1();
                if ($filename1 !== '' && is_string($this->getParameter('upload_dir_carouselHistory'))) {
                    $path = $this->getParameter('upload_dir_carouselHistory') . $filename1;
                    unlink($path);
                }
                $imageFile1name = pathinfo($imageFile1->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile1name = $slugger->slug($imageFile1name);
                $newImageFile1 = $safeImageFile1name . '-' . uniqid('', false) . '.' . $imageFile1->guessExtension();

                try {
                    $imageFile1->move(
                        $this->getParameter('upload_dir_carouselHistory'),
                        $newImageFile1
                    );
                } catch (FileException $e) {
                }
                $carouselHistory->setImage1($newImageFile1);
            }
            if ($imageFile2 !== null) {
                $filename2 = $carouselHistory->getImage2();
                if ($filename2 !== '' && is_string($this->getParameter('upload_dir_carouselHistory'))) {
                    $path = $this->getParameter('upload_dir_carouselHistory') . $filename2;
                    unlink($path);
                }
                $imageFile2name = pathinfo($imageFile2->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile2name = $slugger->slug($imageFile2name);
                $newImageFile2 = $safeImageFile2name . '-' . uniqid('', false) . '.' . $imageFile2->guessExtension();

                try {
                    $imageFile2->move(
                        $this->getParameter('upload_dir_carouselHistory'),
                        $newImageFile2
                    );
                } catch (FileException $e) {
                }
                $carouselHistory->setImage2($newImageFile2);
            }
            if ($imageFile3 !== null) {
                $filename3 = $carouselHistory->getImage3();
                if ($filename3 !== '' && is_string($this->getParameter('upload_dir_carouselHistory'))) {
                    $path = $this->getParameter('upload_dir_carouselHistory') . $filename3;
                    unlink($path);
                }
                $imageFile3name = pathinfo($imageFile3->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile3name = $slugger->slug($imageFile3name);
                $newImageFile3 = $safeImageFile3name . '-' . uniqid('', false) . '.' . $imageFile3->guessExtension();

                try {
                    $imageFile3->move(
                        $this->getParameter('upload_dir_carouselHistory'),
                        $newImageFile3
                    );
                } catch (FileException $e) {
                }
                $carouselHistory->setImage3($newImageFile3);
            }
            if ($imageFile4 !== null) {
                $filename4 = $carouselHistory->getImage4();
                if ($filename4 !== '' && is_string($this->getParameter('upload_dir_carouselHistory'))) {
                    $path = $this->getParameter('upload_dir_carouselHistory') . $filename4;
                    unlink($path);
                }
                $imageFile4name = pathinfo($imageFile4->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile4name = $slugger->slug($imageFile4name);
                $newImageFile4 = $safeImageFile4name . '-' . uniqid('', false) . '.' . $imageFile4->guessExtension();

                try {
                    $imageFile4->move(
                        $this->getParameter('upload_dir_carouselHistory'),
                        $newImageFile4
                    );
                } catch (FileException $e) {
                }
                $carouselHistory->setImage4($newImageFile4);
            }
            if ($imageFile5 !== null) {
                $filename5 = $carouselHistory->getImage5();
                if ($filename5 !== '' && is_string($this->getParameter('upload_dir_carouselHistory'))) {
                    $path = $this->getParameter('upload_dir_carouselHistory') . $filename5;
                    unlink($path);
                }
                $imageFile5name = pathinfo($imageFile5->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile5name = $slugger->slug($imageFile5name);
                $newImageFile5 = $safeImageFile5name . '-' . uniqid('', false) . '.' . $imageFile5->guessExtension();

                try {
                    $imageFile5->move(
                        $this->getParameter('upload_dir_carouselHistory'),
                        $newImageFile5
                    );
                } catch (FileException $e) {
                }
                $carouselHistory->setImage5($newImageFile5);
            }
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_carousel_history');
        }

        return $this->render('home/carousel_history/edit.html.twig', [
            'carousel_history' => $carouselHistory,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/home/carousel/history/delete/{id}", name="home_carousel_history_delete", methods={"DELETE"})
     * @param Request $request
     * @param CarouselHistory $carouselHistory
     * @param EntityManagerInterface $entityManager
     * @return Response
     */
    public function delete(
        Request $request,
        CarouselHistory $carouselHistory,
        EntityManagerInterface $entityManager
    ): Response {
        if ($this->isCsrfTokenValid('delete' . $carouselHistory->getId(), $request->request->get('_token'))) {
            $filename1 = $carouselHistory->getImage1();
            $filename2 = $carouselHistory->getImage2();
            $filename3 = $carouselHistory->getImage3();
            $filename4 = $carouselHistory->getImage4();
            $filename5 = $carouselHistory->getImage5();
            if ($filename1 !== '' && is_string($this->getParameter('upload_dir_carouselHistory'))) {
                $path = $this->getParameter('upload_dir_carouselHistory') . $filename1;
                unlink($path);
            }
            if ($filename2 !== '' && is_string($this->getParameter('upload_dir_carouselHistory'))) {
                $path = $this->getParameter('upload_dir_carouselHistory') . $filename2;
                unlink($path);
            }
            if ($filename3 !== '' && is_string($this->getParameter('upload_dir_carouselHistory'))) {
                $path = $this->getParameter('upload_dir_carouselHistory') . $filename3;
                unlink($path);
            }
            if ($filename4 !== '' && is_string($this->getParameter('upload_dir_carouselHistory'))) {
                $path = $this->getParameter('upload_dir_carouselHistory') . $filename4;
                unlink($path);
            }
            if ($filename5 !== '' && is_string($this->getParameter('upload_dir_carouselHistory'))) {
                $path = $this->getParameter('upload_dir_carouselHistory') . $filename5;
                unlink($path);
            }

            $entityManager->remove($carouselHistory);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_carousel_history');
    }
}
