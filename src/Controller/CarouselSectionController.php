<?php

namespace App\Controller;

use App\Entity\CarouselSection;
use App\Form\CarouselSectionType;
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
class CarouselSectionController extends AbstractController
{
    /**
     * @Route("/home/carousel/section/new", name="home_carousel_section_new", methods={"GET","POST"})
     * @param Request $request
     * @param SluggerInterface $slugger
     * @return Response
     */
    public function new(Request $request, SluggerInterface $slugger): Response
    {
        $carouselSection = new CarouselSection();
        $form = $this->createForm(CarouselSectionType::class, $carouselSection);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $imageFile1 = $form->get('fileimage1')->getData();
            $imageFile2 = $form->get('fileimage2')->getData();
            $imageFile3 = $form->get('fileimage3')->getData();
            $imageFile4 = $form->get('fileimage4')->getData();
            $imageFile5 = $form->get('fileimage5')->getData();
            $imageFile6 = $form->get('fileimage6')->getData();
            $imageFile7 = $form->get('fileimage7')->getData();
            $imageFile8 = $form->get('fileimage8')->getData();
            $imageFile9 = $form->get('fileimage9')->getData();
            $imageFile10 = $form->get('fileimage10')->getData();
            $imageFile11 = $form->get('fileimage11')->getData();
            $imageFile12 = $form->get('fileimage12')->getData();
            $imageFile13 = $form->get('fileimage13')->getData();
            $imageFile14 = $form->get('fileimage14')->getData();
            $imageFile15 = $form->get('fileimage15')->getData();
            $imageFile16 = $form->get('fileimage16')->getData();
            $imageFile17 = $form->get('fileimage17')->getData();
            $imageFile18 = $form->get('fileimage18')->getData();
            $imageFile19 = $form->get('fileimage19')->getData();
            $imageFile20 = $form->get('fileimage20')->getData();
            if ($imageFile1) {
                $imageFile1name = pathinfo($imageFile1->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile1name = $slugger->slug($imageFile1name);
                $newImageFile1 = $safeImageFile1name . '-' . uniqid('', false) . '.' . $imageFile1->guessExtension();

                try {
                    $imageFile1->move(
                        $this->getParameter('upload_dir_carouselSection'),
                        $newImageFile1
                    );
                } catch (FileException $e) {
                }
                $carouselSection->setImage1($newImageFile1);
            }
            if ($imageFile2) {
                $imageFile2name = pathinfo($imageFile2->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile2name = $slugger->slug($imageFile2name);
                $newImageFile2 = $safeImageFile2name . '-' . uniqid('', false) . '.' . $imageFile2->guessExtension();

                try {
                    $imageFile2->move(
                        $this->getParameter('upload_dir_carouselSection'),
                        $newImageFile2
                    );
                } catch (FileException $e) {
                }
                $carouselSection->setImage2($newImageFile2);
            }
            if ($imageFile3) {
                $imageFile3name = pathinfo($imageFile3->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile3name = $slugger->slug($imageFile3name);
                $newImageFile3 = $safeImageFile3name . '-' . uniqid('', false) . '.' . $imageFile3->guessExtension();

                try {
                    $imageFile3->move(
                        $this->getParameter('upload_dir_carouselSection'),
                        $newImageFile3
                    );
                } catch (FileException $e) {
                }
                $carouselSection->setImage3($newImageFile3);
            }
            if ($imageFile4) {
                $imageFile4name = pathinfo($imageFile4->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile4name = $slugger->slug($imageFile4name);
                $newImageFile4 = $safeImageFile4name . '-' . uniqid('', false) . '.' . $imageFile4->guessExtension();

                try {
                    $imageFile4->move(
                        $this->getParameter('upload_dir_carouselSection'),
                        $newImageFile4
                    );
                } catch (FileException $e) {
                }
                $carouselSection->setImage4($newImageFile4);
            }
            if ($imageFile5) {
                $imageFile5name = pathinfo($imageFile5->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile5name = $slugger->slug($imageFile5name);
                $newImageFile5 = $safeImageFile5name . '-' . uniqid('', false) . '.' . $imageFile5->guessExtension();

                try {
                    $imageFile5->move(
                        $this->getParameter('upload_dir_carouselSection'),
                        $newImageFile5
                    );
                } catch (FileException $e) {
                }
                $carouselSection->setImage5($newImageFile5);
            }
            if ($imageFile6) {
                $imageFile6name = pathinfo($imageFile6->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile6name = $slugger->slug($imageFile6name);
                $newImageFile6 = $safeImageFile6name . '-' . uniqid('', false) . '.' . $imageFile6->guessExtension();

                try {
                    $imageFile6->move(
                        $this->getParameter('upload_dir_carouselSection'),
                        $newImageFile6
                    );
                } catch (FileException $e) {
                }
                $carouselSection->setImage6($newImageFile6);
            }
            if ($imageFile7) {
                $imageFile7name = pathinfo($imageFile7->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile7name = $slugger->slug($imageFile7name);
                $newImageFile7 = $safeImageFile7name . '-' . uniqid('', false) . '.' . $imageFile7->guessExtension();

                try {
                    $imageFile7->move(
                        $this->getParameter('upload_dir_carouselSection'),
                        $newImageFile7
                    );
                } catch (FileException $e) {
                }
                $carouselSection->setImage7($newImageFile7);
            }
            if ($imageFile8) {
                $imageFile8name = pathinfo($imageFile8->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile8name = $slugger->slug($imageFile8name);
                $newImageFile8 = $safeImageFile8name . '-' . uniqid('', false) . '.' . $imageFile8->guessExtension();

                try {
                    $imageFile8->move(
                        $this->getParameter('upload_dir_carouselSection'),
                        $newImageFile8
                    );
                } catch (FileException $e) {
                }
                $carouselSection->setImage8($newImageFile8);
            }
            if ($imageFile9) {
                $imageFile9name = pathinfo($imageFile9->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile9name = $slugger->slug($imageFile9name);
                $newImageFile9 = $safeImageFile9name . '-' . uniqid('', false) . '.' . $imageFile9->guessExtension();

                try {
                    $imageFile9->move(
                        $this->getParameter('upload_dir_carouselSection'),
                        $newImageFile9
                    );
                } catch (FileException $e) {
                }
                $carouselSection->setImage9($newImageFile9);
            }
            if ($imageFile10) {
                $imageFile10name = pathinfo($imageFile10->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile10name = $slugger->slug($imageFile10name);
                $newImageFile10 = $safeImageFile10name . '-' . uniqid('', false) . '.' . $imageFile10->guessExtension();

                try {
                    $imageFile10->move(
                        $this->getParameter('upload_dir_carouselSection'),
                        $newImageFile10
                    );
                } catch (FileException $e) {
                }
                $carouselSection->setImage10($newImageFile10);
            }
            if ($imageFile11) {
                $imageFile11name = pathinfo($imageFile11->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile11name = $slugger->slug($imageFile11name);
                $newImageFile11 = $safeImageFile11name . '-' . uniqid('', false) . '.' . $imageFile11->guessExtension();

                try {
                    $imageFile11->move(
                        $this->getParameter('upload_dir_carouselSection'),
                        $newImageFile11
                    );
                } catch (FileException $e) {
                }
                $carouselSection->setImage11($newImageFile11);
            }
            if ($imageFile12) {
                $imageFile12name = pathinfo($imageFile12->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile12name = $slugger->slug($imageFile12name);
                $newImageFile12 = $safeImageFile12name . '-' . uniqid('', false) . '.' . $imageFile12->guessExtension();

                try {
                    $imageFile12->move(
                        $this->getParameter('upload_dir_carouselSection'),
                        $newImageFile12
                    );
                } catch (FileException $e) {
                }
                $carouselSection->setImage12($newImageFile12);
            }
            if ($imageFile13) {
                $imageFile13name = pathinfo($imageFile13->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile13name = $slugger->slug($imageFile13name);
                $newImageFile13 = $safeImageFile13name . '-' . uniqid('', false) . '.' . $imageFile13->guessExtension();

                try {
                    $imageFile13->move(
                        $this->getParameter('upload_dir_carouselSection'),
                        $newImageFile13
                    );
                } catch (FileException $e) {
                }
                $carouselSection->setImage13($newImageFile13);
            }
            if ($imageFile14) {
                $imageFile14name = pathinfo($imageFile14->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile14name = $slugger->slug($imageFile14name);
                $newImageFile14 = $safeImageFile14name . '-' . uniqid('', false) . '.' . $imageFile14->guessExtension();

                try {
                    $imageFile14->move(
                        $this->getParameter('upload_dir_carouselSection'),
                        $newImageFile14
                    );
                } catch (FileException $e) {
                }
                $carouselSection->setImage14($newImageFile14);
            }
            if ($imageFile15) {
                $imageFile15name = pathinfo($imageFile15->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile15name = $slugger->slug($imageFile15name);
                $newImageFile15 = $safeImageFile15name . '-' . uniqid('', false) . '.' . $imageFile15->guessExtension();

                try {
                    $imageFile15->move(
                        $this->getParameter('upload_dir_carouselSection'),
                        $newImageFile15
                    );
                } catch (FileException $e) {
                }
                $carouselSection->setImage15($newImageFile15);
            }
            if ($imageFile16) {
                $imageFile16name = pathinfo($imageFile16->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile16name = $slugger->slug($imageFile16name);
                $newImageFile16 = $safeImageFile16name . '-' . uniqid('', false) . '.' . $imageFile16->guessExtension();

                try {
                    $imageFile16->move(
                        $this->getParameter('upload_dir_carouselSection'),
                        $newImageFile16
                    );
                } catch (FileException $e) {
                }
                $carouselSection->setImage16($newImageFile16);
            }
            if ($imageFile17) {
                $imageFile17name = pathinfo($imageFile17->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile17name = $slugger->slug($imageFile17name);
                $newImageFile17 = $safeImageFile17name . '-' . uniqid('', false) . '.' . $imageFile17->guessExtension();

                try {
                    $imageFile17->move(
                        $this->getParameter('upload_dir_carouselSection'),
                        $newImageFile17
                    );
                } catch (FileException $e) {
                }
                $carouselSection->setImage17($newImageFile17);
            }
            if ($imageFile18) {
                $imageFile18name = pathinfo($imageFile18->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile18name = $slugger->slug($imageFile18name);
                $newImageFile18 = $safeImageFile18name . '-' . uniqid('', false) . '.' . $imageFile18->guessExtension();

                try {
                    $imageFile18->move(
                        $this->getParameter('upload_dir_carouselSection'),
                        $newImageFile18
                    );
                } catch (FileException $e) {
                }
                $carouselSection->setImage18($newImageFile18);
            }
            if ($imageFile19) {
                $imageFile19name = pathinfo($imageFile19->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile19name = $slugger->slug($imageFile19name);
                $newImageFile19 = $safeImageFile19name . '-' . uniqid('', false) . '.' . $imageFile19->guessExtension();

                try {
                    $imageFile19->move(
                        $this->getParameter('upload_dir_carouselSection'),
                        $newImageFile19
                    );
                } catch (FileException $e) {
                }
                $carouselSection->setImage19($newImageFile19);
            }
            if ($imageFile20) {
                $imageFile20name = pathinfo($imageFile20->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile20name = $slugger->slug($imageFile20name);
                $newImageFile20 = $safeImageFile20name . '-' . uniqid('', false) . '.' . $imageFile20->guessExtension();

                try {
                    $imageFile20->move(
                        $this->getParameter('upload_dir_carouselSection'),
                        $newImageFile20
                    );
                } catch (FileException $e) {
                }
                $carouselSection->setImage20($newImageFile20);
            }
            $entityManager->persist($carouselSection);
            $entityManager->flush();

            return $this->redirectToRoute('admin_carousel_section');
        }

        return $this->render('home/carousel_section/new.html.twig', [
            'carousel_section' => $carouselSection,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/home/carousel/section/show/{id}", name="home_carousel_section_show", methods={"GET"})
     * @param CarouselSection $carouselSection
     * @return Response
     */
    public function show(CarouselSection $carouselSection): Response
    {
        return $this->render('home/carousel_section/show.html.twig', [
            'carousel_section' => $carouselSection,
        ]);
    }

    /**
     * @Route("/home/carousel/section/edit/{id}", name="home_carousel_section_edit", methods={"GET","POST"})
     * @param Request $request
     * @param CarouselSection $carouselSection
     * @param SluggerInterface $slugger
     * @return Response
     */
    public function edit(Request $request, CarouselSection $carouselSection, SluggerInterface $slugger): Response
    {
        $form = $this->createForm(CarouselSectionType::class, $carouselSection);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $imageFile1 = $form->get('fileimage1')->getData();
            $imageFile2 = $form->get('fileimage2')->getData();
            $imageFile3 = $form->get('fileimage3')->getData();
            $imageFile4 = $form->get('fileimage4')->getData();
            $imageFile5 = $form->get('fileimage5')->getData();
            $imageFile6 = $form->get('fileimage6')->getData();
            $imageFile7 = $form->get('fileimage7')->getData();
            $imageFile8 = $form->get('fileimage8')->getData();
            $imageFile9 = $form->get('fileimage9')->getData();
            $imageFile10 = $form->get('fileimage10')->getData();
            $imageFile11 = $form->get('fileimage11')->getData();
            $imageFile12 = $form->get('fileimage12')->getData();
            $imageFile13 = $form->get('fileimage13')->getData();
            $imageFile14 = $form->get('fileimage14')->getData();
            $imageFile15 = $form->get('fileimage15')->getData();
            $imageFile16 = $form->get('fileimage16')->getData();
            $imageFile17 = $form->get('fileimage17')->getData();
            $imageFile18 = $form->get('fileimage18')->getData();
            $imageFile19 = $form->get('fileimage19')->getData();
            $imageFile20 = $form->get('fileimage20')->getData();
            if ($imageFile1 !== null) {
                $filename1 = $carouselSection->getImage1();
                if ($filename1 !== '' && is_string($this->getParameter('upload_dir_carouselSection'))) {
                    $path = $this->getParameter('upload_dir_carouselSection') . $filename1;
                    unlink($path);
                }
                $imageFile1name = pathinfo($imageFile1->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile1name = $slugger->slug($imageFile1name);
                $newImageFile1 = $safeImageFile1name . '-' . uniqid('', false) . '.' . $imageFile1->guessExtension();

                try {
                    $imageFile1->move(
                        $this->getParameter('upload_dir_carouselSection'),
                        $newImageFile1
                    );
                } catch (FileException $e) {
                }
                $carouselSection->setImage1($newImageFile1);
            }
            if ($imageFile2 !== null) {
                $filename2 = $carouselSection->getImage2();
                if ($filename2 !== '' && is_string($this->getParameter('upload_dir_carouselSection'))) {
                    $path = $this->getParameter('upload_dir_carouselSection') . $filename2;
                    unlink($path);
                }
                $imageFile2name = pathinfo($imageFile2->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile2name = $slugger->slug($imageFile2name);
                $newImageFile2 = $safeImageFile2name . '-' . uniqid('', false) . '.' . $imageFile2->guessExtension();

                try {
                    $imageFile2->move(
                        $this->getParameter('upload_dir_carouselSection'),
                        $newImageFile2
                    );
                } catch (FileException $e) {
                }
                $carouselSection->setImage2($newImageFile2);
            }
            if ($imageFile3 !== null) {
                $filename3 = $carouselSection->getImage3();
                if ($filename3 !== '' && is_string($this->getParameter('upload_dir_carouselSection'))) {
                    $path = $this->getParameter('upload_dir_carouselSection') . $filename3;
                    unlink($path);
                }
                $imageFile3name = pathinfo($imageFile3->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile3name = $slugger->slug($imageFile3name);
                $newImageFile3 = $safeImageFile3name . '-' . uniqid('', false) . '.' . $imageFile3->guessExtension();

                try {
                    $imageFile3->move(
                        $this->getParameter('upload_dir_carouselSection'),
                        $newImageFile3
                    );
                } catch (FileException $e) {
                }
                $carouselSection->setImage3($newImageFile3);
            }
            if ($imageFile4 !== null) {
                $filename4 = $carouselSection->getImage4();
                if ($filename4 !== '' && is_string($this->getParameter('upload_dir_carouselSection'))) {
                    $path = $this->getParameter('upload_dir_carouselSection') . $filename4;
                    unlink($path);
                }
                $imageFile4name = pathinfo($imageFile4->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile4name = $slugger->slug($imageFile4name);
                $newImageFile4 = $safeImageFile4name . '-' . uniqid('', false) . '.' . $imageFile4->guessExtension();

                try {
                    $imageFile4->move(
                        $this->getParameter('upload_dir_carouselSection'),
                        $newImageFile4
                    );
                } catch (FileException $e) {
                }
                $carouselSection->setImage4($newImageFile4);
            }
            if ($imageFile5 !== null) {
                $filename5 = $carouselSection->getImage5();
                if ($filename5 !== '' && is_string($this->getParameter('upload_dir_carouselSection'))) {
                    $path = $this->getParameter('upload_dir_carouselSection') . $filename5;
                    unlink($path);
                }
                $imageFile5name = pathinfo($imageFile5->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile5name = $slugger->slug($imageFile5name);
                $newImageFile5 = $safeImageFile5name . '-' . uniqid('', false) . '.' . $imageFile5->guessExtension();

                try {
                    $imageFile5->move(
                        $this->getParameter('upload_dir_carouselSection'),
                        $newImageFile5
                    );
                } catch (FileException $e) {
                }
                $carouselSection->setImage5($newImageFile5);
            }
            if ($imageFile6 !== null) {
                $filename6 = $carouselSection->getImage6();
                if ($filename6 !== '' && is_string($this->getParameter('upload_dir_carouselSection'))) {
                    $path = $this->getParameter('upload_dir_carouselSection') . $filename6;
                    unlink($path);
                }
                $imageFile6name = pathinfo($imageFile6->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile6name = $slugger->slug($imageFile6name);
                $newImageFile6 = $safeImageFile6name . '-' . uniqid('', false) . '.' . $imageFile6->guessExtension();

                try {
                    $imageFile6->move(
                        $this->getParameter('upload_dir_carouselSection'),
                        $newImageFile6
                    );
                } catch (FileException $e) {
                }
                $carouselSection->setImage6($newImageFile6);
            }
            if ($imageFile7 !== null) {
                $filename7 = $carouselSection->getImage7();
                if ($filename7 !== '' && is_string($this->getParameter('upload_dir_carouselSection'))) {
                    $path = $this->getParameter('upload_dir_carouselSection') . $filename7;
                    unlink($path);
                }
                $imageFile7name = pathinfo($imageFile7->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile7name = $slugger->slug($imageFile7name);
                $newImageFile7 = $safeImageFile7name . '-' . uniqid('', false) . '.' . $imageFile7->guessExtension();

                try {
                    $imageFile7->move(
                        $this->getParameter('upload_dir_carouselSection'),
                        $newImageFile7
                    );
                } catch (FileException $e) {
                }
                $carouselSection->setImage7($newImageFile7);
            }
            if ($imageFile8 !== null) {
                $filename8 = $carouselSection->getImage8();
                if ($filename8 !== '' && is_string($this->getParameter('upload_dir_carouselSection'))) {
                    $path = $this->getParameter('upload_dir_carouselSection') . $filename8;
                    unlink($path);
                }
                $imageFile8name = pathinfo($imageFile8->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile8name = $slugger->slug($imageFile8name);
                $newImageFile8 = $safeImageFile8name . '-' . uniqid('', false) . '.' . $imageFile8->guessExtension();

                try {
                    $imageFile8->move(
                        $this->getParameter('upload_dir_carouselSection'),
                        $newImageFile8
                    );
                } catch (FileException $e) {
                }
                $carouselSection->setImage8($newImageFile8);
            }
            if ($imageFile9 !== null) {
                $filename9 = $carouselSection->getImage9();
                if ($filename9 !== '' && is_string($this->getParameter('upload_dir_carouselSection'))) {
                    $path = $this->getParameter('upload_dir_carouselSection') . $filename9;
                    unlink($path);
                }
                $imageFile9name = pathinfo($imageFile9->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile9name = $slugger->slug($imageFile9name);
                $newImageFile9 = $safeImageFile9name . '-' . uniqid('', false) . '.' . $imageFile9->guessExtension();

                try {
                    $imageFile9->move(
                        $this->getParameter('upload_dir_carouselSection'),
                        $newImageFile9
                    );
                } catch (FileException $e) {
                }
                $carouselSection->setImage9($newImageFile9);
            }
            if ($imageFile10 !== null) {
                $filename10 = $carouselSection->getImage10();
                if ($filename10 !== '' && is_string($this->getParameter('upload_dir_carouselSection'))) {
                    $path = $this->getParameter('upload_dir_carouselSection') . $filename10;
                    unlink($path);
                }
                $imageFile10name = pathinfo($imageFile10->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile10name = $slugger->slug($imageFile10name);
                $newImageFile10 = $safeImageFile10name . '-' . uniqid('', false) . '.' . $imageFile10->guessExtension();

                try {
                    $imageFile10->move(
                        $this->getParameter('upload_dir_carouselSection'),
                        $newImageFile10
                    );
                } catch (FileException $e) {
                }
                $carouselSection->setImage10($newImageFile10);
            }
            if ($imageFile11 !== null) {
                $filename11 = $carouselSection->getImage11();
                if ($filename11 !== '' && is_string($this->getParameter('upload_dir_carouselSection'))) {
                    $path = $this->getParameter('upload_dir_carouselSection') . $filename11;
                    unlink($path);
                }
                $imageFile11name = pathinfo($imageFile11->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile11name = $slugger->slug($imageFile11name);
                $newImageFile11 = $safeImageFile11name . '-' . uniqid('', false) . '.' . $imageFile11->guessExtension();

                try {
                    $imageFile11->move(
                        $this->getParameter('upload_dir_carouselSection'),
                        $newImageFile11
                    );
                } catch (FileException $e) {
                }
                $carouselSection->setImage11($newImageFile11);
            }
            if ($imageFile12 !== null) {
                $filename12 = $carouselSection->getImage12();
                if ($filename12 !== '' && is_string($this->getParameter('upload_dir_carouselSection'))) {
                    $path = $this->getParameter('upload_dir_carouselSection') . $filename12;
                    unlink($path);
                }
                $imageFile12name = pathinfo($imageFile12->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile12name = $slugger->slug($imageFile12name);
                $newImageFile12 = $safeImageFile12name . '-' . uniqid('', false) . '.' . $imageFile12->guessExtension();

                try {
                    $imageFile12->move(
                        $this->getParameter('upload_dir_carouselSection'),
                        $newImageFile12
                    );
                } catch (FileException $e) {
                }
                $carouselSection->setImage12($newImageFile12);
            }
            if ($imageFile13 !== null) {
                $filename13 = $carouselSection->getImage13();
                if ($filename13 !== '' && is_string($this->getParameter('upload_dir_carouselSection'))) {
                    $path = $this->getParameter('upload_dir_carouselSection') . $filename13;
                    unlink($path);
                }
                $imageFile13name = pathinfo($imageFile13->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile13name = $slugger->slug($imageFile13name);
                $newImageFile13 = $safeImageFile13name . '-' . uniqid('', false) . '.' . $imageFile13->guessExtension();

                try {
                    $imageFile13->move(
                        $this->getParameter('upload_dir_carouselSection'),
                        $newImageFile13
                    );
                } catch (FileException $e) {
                }
                $carouselSection->setImage13($newImageFile13);
            }
            if ($imageFile14 !== null) {
                $filename14 = $carouselSection->getImage14();
                if ($filename14 !== '' && is_string($this->getParameter('upload_dir_carouselSection'))) {
                    $path = $this->getParameter('upload_dir_carouselSection') . $filename14;
                    unlink($path);
                }
                $imageFile14name = pathinfo($imageFile14->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile14name = $slugger->slug($imageFile14name);
                $newImageFile14 = $safeImageFile14name . '-' . uniqid('', false) . '.' . $imageFile14->guessExtension();

                try {
                    $imageFile14->move(
                        $this->getParameter('upload_dir_carouselSection'),
                        $newImageFile14
                    );
                } catch (FileException $e) {
                }
                $carouselSection->setImage14($newImageFile14);
            }
            if ($imageFile15 !== null) {
                $filename15 = $carouselSection->getImage15();
                if ($filename15 !== '' && is_string($this->getParameter('upload_dir_carouselSection'))) {
                    $path = $this->getParameter('upload_dir_carouselSection') . $filename15;
                    unlink($path);
                }
                $imageFile15name = pathinfo($imageFile15->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile15name = $slugger->slug($imageFile15name);
                $newImageFile15 = $safeImageFile15name . '-' . uniqid('', false) . '.' . $imageFile15->guessExtension();

                try {
                    $imageFile15->move(
                        $this->getParameter('upload_dir_carouselSection'),
                        $newImageFile15
                    );
                } catch (FileException $e) {
                }
                $carouselSection->setImage15($newImageFile15);
            }
            if ($imageFile16 !== null) {
                $filename16 = $carouselSection->getImage16();
                if ($filename16 !== '' && is_string($this->getParameter('upload_dir_carouselSection'))) {
                    $path = $this->getParameter('upload_dir_carouselSection') . $filename16;
                    unlink($path);
                }
                $imageFile16name = pathinfo($imageFile16->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile16name = $slugger->slug($imageFile16name);
                $newImageFile16 = $safeImageFile16name . '-' . uniqid('', false) . '.' . $imageFile16->guessExtension();

                try {
                    $imageFile16->move(
                        $this->getParameter('upload_dir_carouselSection'),
                        $newImageFile16
                    );
                } catch (FileException $e) {
                }
                $carouselSection->setImage16($newImageFile16);
            }
            if ($imageFile17 !== null) {
                $filename17 = $carouselSection->getImage17();
                if ($filename17 !== '' && is_string($this->getParameter('upload_dir_carouselSection'))) {
                    $path = $this->getParameter('upload_dir_carouselSection') . $filename17;
                    unlink($path);
                }
                $imageFile17name = pathinfo($imageFile17->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile17name = $slugger->slug($imageFile17name);
                $newImageFile17 = $safeImageFile17name . '-' . uniqid('', false) . '.' . $imageFile17->guessExtension();

                try {
                    $imageFile17->move(
                        $this->getParameter('upload_dir_carouselSection'),
                        $newImageFile17
                    );
                } catch (FileException $e) {
                }
                $carouselSection->setImage17($newImageFile17);
            }
            if ($imageFile18 !== null) {
                $filename18 = $carouselSection->getImage18();
                if ($filename18 !== '' && is_string($this->getParameter('upload_dir_carouselSection'))) {
                    $path = $this->getParameter('upload_dir_carouselSection') . $filename18;
                    unlink($path);
                }
                $imageFile18name = pathinfo($imageFile18->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile18name = $slugger->slug($imageFile18name);
                $newImageFile18 = $safeImageFile18name . '-' . uniqid('', false) . '.' . $imageFile18->guessExtension();

                try {
                    $imageFile18->move(
                        $this->getParameter('upload_dir_carouselSection'),
                        $newImageFile18
                    );
                } catch (FileException $e) {
                }
                $carouselSection->setImage18($newImageFile18);
            }
            if ($imageFile19 !== null) {
                $filename19 = $carouselSection->getImage19();
                if ($filename19 !== '' && is_string($this->getParameter('upload_dir_carouselSection'))) {
                    $path = $this->getParameter('upload_dir_carouselSection') . $filename19;
                    unlink($path);
                }
                $imageFile19name = pathinfo($imageFile19->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile19name = $slugger->slug($imageFile19name);
                $newImageFile19 = $safeImageFile19name . '-' . uniqid('', false) . '.' . $imageFile19->guessExtension();

                try {
                    $imageFile19->move(
                        $this->getParameter('upload_dir_carouselSection'),
                        $newImageFile19
                    );
                } catch (FileException $e) {
                }
                $carouselSection->setImage19($newImageFile19);
            }
            if ($imageFile20 !== null) {
                $filename20 = $carouselSection->getImage20();
                if ($filename20 !== '' && is_string($this->getParameter('upload_dir_carouselSection'))) {
                    $path = $this->getParameter('upload_dir_carouselSection') . $filename20;
                    unlink($path);
                }
                $imageFile20name = pathinfo($imageFile20->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile20name = $slugger->slug($imageFile20name);
                $newImageFile20 = $safeImageFile20name . '-' . uniqid('', false) . '.' . $imageFile20->guessExtension();

                try {
                    $imageFile20->move(
                        $this->getParameter('upload_dir_carouselSection'),
                        $newImageFile20
                    );
                } catch (FileException $e) {
                }
                $carouselSection->setImage20($newImageFile20);
            }
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_carousel_section');
        }

        return $this->render('home/carousel_section/edit.html.twig', [
            'carousel_section' => $carouselSection,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/home/carousel/section/delete/{id}", name="home_carousel_section_delete", methods={"DELETE"})
     * @param Request $request
     * @param CarouselSection $carouselSection
     * @param EntityManagerInterface $entityManager
     * @return Response
     */
    public function delete(
        Request $request,
        CarouselSection $carouselSection,
        EntityManagerInterface $entityManager
    ): Response {
        if ($this->isCsrfTokenValid('delete' . $carouselSection->getId(), $request->request->get('_token'))) {
            $filename1 = $carouselSection->getImage1();
            if ($filename1 !== '' && is_string($this->getParameter('upload_dir_carouselSection'))) {
                $path = $this->getParameter('upload_dir_carouselSection') . $filename1;
                unlink($path);
            }
            $filename2 = $carouselSection->getImage2();
            if ($filename2 !== '' && is_string($this->getParameter('upload_dir_carouselSection'))) {
                $path = $this->getParameter('upload_dir_carouselSection') . $filename2;
                unlink($path);
            }
            $filename3 = $carouselSection->getImage3();
            if ($filename3 !== '' && is_string($this->getParameter('upload_dir_carouselSection'))) {
                $path = $this->getParameter('upload_dir_carouselSection') . $filename3;
                unlink($path);
            }
            $filename4 = $carouselSection->getImage4();
            if ($filename4 !== '' && is_string($this->getParameter('upload_dir_carouselSection'))) {
                $path = $this->getParameter('upload_dir_carouselSection') . $filename4;
                unlink($path);
            }
            $filename5 = $carouselSection->getImage5();
            if ($filename5 !== '' && is_string($this->getParameter('upload_dir_carouselSection'))) {
                $path = $this->getParameter('upload_dir_carouselSection') . $filename5;
                unlink($path);
            }
            $filename6 = $carouselSection->getImage6();
            if ($filename6 !== '' && is_string($this->getParameter('upload_dir_carouselSection'))) {
                $path = $this->getParameter('upload_dir_carouselSection') . $filename6;
                unlink($path);
            }
            $filename7 = $carouselSection->getImage7();
            if ($filename7 !== '' && is_string($this->getParameter('upload_dir_carouselSection'))) {
                $path = $this->getParameter('upload_dir_carouselSection') . $filename7;
                unlink($path);
            }
            $filename8 = $carouselSection->getImage8();
            if ($filename8 !== '' && is_string($this->getParameter('upload_dir_carouselSection'))) {
                $path = $this->getParameter('upload_dir_carouselSection') . $filename8;
                unlink($path);
            }
            $filename9 = $carouselSection->getImage9();
            if ($filename9 !== '' && is_string($this->getParameter('upload_dir_carouselSection'))) {
                $path = $this->getParameter('upload_dir_carouselSection') . $filename9;
                unlink($path);
            }
            $filename10 = $carouselSection->getImage10();
            if ($filename10 !== '' && is_string($this->getParameter('upload_dir_carouselSection'))) {
                $path = $this->getParameter('upload_dir_carouselSection') . $filename10;
                unlink($path);
            }
            $filename11 = $carouselSection->getImage11();
            if ($filename11 !== '' && is_string($this->getParameter('upload_dir_carouselSection'))) {
                $path = $this->getParameter('upload_dir_carouselSection') . $filename11;
                unlink($path);
            }
            $filename12 = $carouselSection->getImage12();
            if ($filename12 !== '' && is_string($this->getParameter('upload_dir_carouselSection'))) {
                $path = $this->getParameter('upload_dir_carouselSection') . $filename12;
                unlink($path);
            }
            $filename13 = $carouselSection->getImage13();
            if ($filename13 !== '' && is_string($this->getParameter('upload_dir_carouselSection'))) {
                $path = $this->getParameter('upload_dir_carouselSection') . $filename13;
                unlink($path);
            }
            $filename14 = $carouselSection->getImage14();
            if ($filename14 !== '' && is_string($this->getParameter('upload_dir_carouselSection'))) {
                $path = $this->getParameter('upload_dir_carouselSection') . $filename14;
                unlink($path);
            }
            $filename15 = $carouselSection->getImage15();
            if ($filename15 !== '' && is_string($this->getParameter('upload_dir_carouselSection'))) {
                $path = $this->getParameter('upload_dir_carouselSection') . $filename15;
                unlink($path);
            }
            $filename16 = $carouselSection->getImage16();
            if ($filename16 !== '' && is_string($this->getParameter('upload_dir_carouselSection'))) {
                $path = $this->getParameter('upload_dir_carouselSection') . $filename16;
                unlink($path);
            }
            $filename17 = $carouselSection->getImage17();
            if ($filename17 !== '' && is_string($this->getParameter('upload_dir_carouselSection'))) {
                $path = $this->getParameter('upload_dir_carouselSection') . $filename17;
                unlink($path);
            }
            $filename18 = $carouselSection->getImage18();
            if ($filename18 !== '' && is_string($this->getParameter('upload_dir_carouselSection'))) {
                $path = $this->getParameter('upload_dir_carouselSection') . $filename18;
                unlink($path);
            }
            $filename19 = $carouselSection->getImage19();
            if ($filename19 !== '' && is_string($this->getParameter('upload_dir_carouselSection'))) {
                $path = $this->getParameter('upload_dir_carouselSection') . $filename19;
                unlink($path);
            }
            $filename20 = $carouselSection->getImage20();
            if ($filename20 !== '' && is_string($this->getParameter('upload_dir_carouselSection'))) {
                $path = $this->getParameter('upload_dir_carouselSection') . $filename20;
                unlink($path);
            }
            $entityManager->remove($carouselSection);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_carousel_section');
    }
}
