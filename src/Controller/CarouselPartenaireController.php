<?php

namespace App\Controller;

use App\Entity\CarouselPartenaire;
use App\Form\CarouselPartenaireType;
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
class CarouselPartenaireController extends AbstractController
{
    /**
     * @Route("/carousel/partenaire/new", name="home_carousel_partenaire_new", methods={"GET","POST"})
     * @param Request $request
     * @param SluggerInterface $slugger
     * @return Response
     */
    public function new(Request $request, SluggerInterface $slugger): Response
    {
        $carouselPartenaire = new CarouselPartenaire();
        $form = $this->createForm(CarouselPartenaireType::class, $carouselPartenaire);
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
            $imageFile21 = $form->get('fileimage21')->getData();
            $imageFile22 = $form->get('fileimage22')->getData();
            $imageFile23 = $form->get('fileimage23')->getData();
            $imageFile24 = $form->get('fileimage24')->getData();
            $imageFile25 = $form->get('fileimage25')->getData();
            $imageFile26 = $form->get('fileimage26')->getData();
            $imageFile27 = $form->get('fileimage27')->getData();
            $imageFile28 = $form->get('fileimage28')->getData();
            $imageFile29 = $form->get('fileimage29')->getData();
            $imageFile30 = $form->get('fileimage30')->getData();
            if ($imageFile1) {
                $imageFile1name = pathinfo($imageFile1->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile1name = $slugger->slug($imageFile1name);
                $newImageFile1 = $safeImageFile1name . '-' . uniqid('', false) . '.' . $imageFile1->guessExtension();

                try {
                    $imageFile1->move(
                        $this->getParameter('upload_dir_carouselPartenaire'),
                        $newImageFile1
                    );
                } catch (FileException $e) {
                }
                $carouselPartenaire->setImage1($newImageFile1);
            }
            if ($imageFile2) {
                $imageFile2name = pathinfo($imageFile2->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile2name = $slugger->slug($imageFile2name);
                $newImageFile2 = $safeImageFile2name . '-' . uniqid('', false) . '.' . $imageFile2->guessExtension();

                try {
                    $imageFile2->move(
                        $this->getParameter('upload_dir_carouselPartenaire'),
                        $newImageFile2
                    );
                } catch (FileException $e) {
                }
                $carouselPartenaire->setImage2($newImageFile2);
            }
            if ($imageFile3) {
                $imageFile3name = pathinfo($imageFile3->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile3name = $slugger->slug($imageFile3name);
                $newImageFile3 = $safeImageFile3name . '-' . uniqid('', false) . '.' . $imageFile3->guessExtension();

                try {
                    $imageFile3->move(
                        $this->getParameter('upload_dir_carouselPartenaire'),
                        $newImageFile3
                    );
                } catch (FileException $e) {
                }
                $carouselPartenaire->setImage3($newImageFile3);
            }
            if ($imageFile4) {
                $imageFile4name = pathinfo($imageFile4->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile4name = $slugger->slug($imageFile4name);
                $newImageFile4 = $safeImageFile4name . '-' . uniqid('', false) . '.' . $imageFile4->guessExtension();

                try {
                    $imageFile4->move(
                        $this->getParameter('upload_dir_carouselPartenaire'),
                        $newImageFile4
                    );
                } catch (FileException $e) {
                }
                $carouselPartenaire->setImage4($newImageFile4);
            }
            if ($imageFile5) {
                $imageFile5name = pathinfo($imageFile5->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile5name = $slugger->slug($imageFile5name);
                $newImageFile5 = $safeImageFile5name . '-' . uniqid('', false) . '.' . $imageFile5->guessExtension();

                try {
                    $imageFile5->move(
                        $this->getParameter('upload_dir_carouselPartenaire'),
                        $newImageFile5
                    );
                } catch (FileException $e) {
                }
                $carouselPartenaire->setImage5($newImageFile5);
            }
            if ($imageFile6) {
                $imageFile6name = pathinfo($imageFile6->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile6name = $slugger->slug($imageFile6name);
                $newImageFile6 = $safeImageFile6name . '-' . uniqid('', false) . '.' . $imageFile6->guessExtension();

                try {
                    $imageFile6->move(
                        $this->getParameter('upload_dir_carouselPartenaire'),
                        $newImageFile6
                    );
                } catch (FileException $e) {
                }
                $carouselPartenaire->setImage6($newImageFile6);
            }
            if ($imageFile7) {
                $imageFile7name = pathinfo($imageFile7->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile7name = $slugger->slug($imageFile7name);
                $newImageFile7 = $safeImageFile7name . '-' . uniqid('', false) . '.' . $imageFile7->guessExtension();

                try {
                    $imageFile7->move(
                        $this->getParameter('upload_dir_carouselPartenaire'),
                        $newImageFile7
                    );
                } catch (FileException $e) {
                }
                $carouselPartenaire->setImage7($newImageFile7);
            }
            if ($imageFile8) {
                $imageFile8name = pathinfo($imageFile8->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile8name = $slugger->slug($imageFile8name);
                $newImageFile8 = $safeImageFile8name . '-' . uniqid('', false) . '.' . $imageFile8->guessExtension();

                try {
                    $imageFile8->move(
                        $this->getParameter('upload_dir_carouselPartenaire'),
                        $newImageFile8
                    );
                } catch (FileException $e) {
                }
                $carouselPartenaire->setImage8($newImageFile8);
            }
            if ($imageFile9) {
                $imageFile9name = pathinfo($imageFile9->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile9name = $slugger->slug($imageFile9name);
                $newImageFile9 = $safeImageFile9name . '-' . uniqid('', false) . '.' . $imageFile9->guessExtension();

                try {
                    $imageFile9->move(
                        $this->getParameter('upload_dir_carouselPartenaire'),
                        $newImageFile9
                    );
                } catch (FileException $e) {
                }
                $carouselPartenaire->setImage9($newImageFile9);
            }
            if ($imageFile10) {
                $imageFile10name = pathinfo($imageFile10->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile10name = $slugger->slug($imageFile10name);
                $newImageFile10 = $safeImageFile10name . '-' . uniqid('', false) . '.' . $imageFile10->guessExtension();

                try {
                    $imageFile10->move(
                        $this->getParameter('upload_dir_carouselPartenaire'),
                        $newImageFile10
                    );
                } catch (FileException $e) {
                }
                $carouselPartenaire->setImage10($newImageFile10);
            }
            if ($imageFile11) {
                $imageFile11name = pathinfo($imageFile11->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile11name = $slugger->slug($imageFile11name);
                $newImageFile11 = $safeImageFile11name . '-' . uniqid('', false) . '.' . $imageFile11->guessExtension();

                try {
                    $imageFile11->move(
                        $this->getParameter('upload_dir_carouselPartenaire'),
                        $newImageFile11
                    );
                } catch (FileException $e) {
                }
                $carouselPartenaire->setImage11($newImageFile11);
            }
            if ($imageFile12) {
                $imageFile12name = pathinfo($imageFile12->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile12name = $slugger->slug($imageFile12name);
                $newImageFile12 = $safeImageFile12name . '-' . uniqid('', false) . '.' . $imageFile12->guessExtension();

                try {
                    $imageFile12->move(
                        $this->getParameter('upload_dir_carouselPartenaire'),
                        $newImageFile12
                    );
                } catch (FileException $e) {
                }
                $carouselPartenaire->setImage12($newImageFile12);
            }
            if ($imageFile13) {
                $imageFile13name = pathinfo($imageFile13->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile13name = $slugger->slug($imageFile13name);
                $newImageFile13 = $safeImageFile13name . '-' . uniqid('', false) . '.' . $imageFile13->guessExtension();

                try {
                    $imageFile13->move(
                        $this->getParameter('upload_dir_carouselPartenaire'),
                        $newImageFile13
                    );
                } catch (FileException $e) {
                }
                $carouselPartenaire->setImage13($newImageFile13);
            }
            if ($imageFile14) {
                $imageFile14name = pathinfo($imageFile14->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile14name = $slugger->slug($imageFile14name);
                $newImageFile14 = $safeImageFile14name . '-' . uniqid('', false) . '.' . $imageFile14->guessExtension();

                try {
                    $imageFile14->move(
                        $this->getParameter('upload_dir_carouselPartenaire'),
                        $newImageFile14
                    );
                } catch (FileException $e) {
                }
                $carouselPartenaire->setImage14($newImageFile14);
            }
            if ($imageFile15) {
                $imageFile15name = pathinfo($imageFile15->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile15name = $slugger->slug($imageFile15name);
                $newImageFile15 = $safeImageFile15name . '-' . uniqid('', false) . '.' . $imageFile15->guessExtension();

                try {
                    $imageFile15->move(
                        $this->getParameter('upload_dir_carouselPartenaire'),
                        $newImageFile15
                    );
                } catch (FileException $e) {
                }
                $carouselPartenaire->setImage15($newImageFile15);
            }
            if ($imageFile16) {
                $imageFile16name = pathinfo($imageFile16->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile16name = $slugger->slug($imageFile16name);
                $newImageFile16 = $safeImageFile16name . '-' . uniqid('', false) . '.' . $imageFile16->guessExtension();

                try {
                    $imageFile16->move(
                        $this->getParameter('upload_dir_carouselPartenaire'),
                        $newImageFile16
                    );
                } catch (FileException $e) {
                }
                $carouselPartenaire->setImage16($newImageFile16);
            }
            if ($imageFile17) {
                $imageFile17name = pathinfo($imageFile17->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile17name = $slugger->slug($imageFile17name);
                $newImageFile17 = $safeImageFile17name . '-' . uniqid('', false) . '.' . $imageFile17->guessExtension();

                try {
                    $imageFile17->move(
                        $this->getParameter('upload_dir_carouselPartenaire'),
                        $newImageFile17
                    );
                } catch (FileException $e) {
                }
                $carouselPartenaire->setImage17($newImageFile17);
            }
            if ($imageFile18) {
                $imageFile18name = pathinfo($imageFile18->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile18name = $slugger->slug($imageFile18name);
                $newImageFile18 = $safeImageFile18name . '-' . uniqid('', false) . '.' . $imageFile18->guessExtension();

                try {
                    $imageFile18->move(
                        $this->getParameter('upload_dir_carouselPartenaire'),
                        $newImageFile18
                    );
                } catch (FileException $e) {
                }
                $carouselPartenaire->setImage18($newImageFile18);
            }
            if ($imageFile19) {
                $imageFile19name = pathinfo($imageFile19->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile19name = $slugger->slug($imageFile19name);
                $newImageFile19 = $safeImageFile19name . '-' . uniqid('', false) . '.' . $imageFile19->guessExtension();

                try {
                    $imageFile19->move(
                        $this->getParameter('upload_dir_carouselPartenaire'),
                        $newImageFile19
                    );
                } catch (FileException $e) {
                }
                $carouselPartenaire->setImage19($newImageFile19);
            }
            if ($imageFile20) {
                $imageFile20name = pathinfo($imageFile20->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile20name = $slugger->slug($imageFile20name);
                $newImageFile20 = $safeImageFile20name . '-' . uniqid('', false) . '.' . $imageFile20->guessExtension();

                try {
                    $imageFile20->move(
                        $this->getParameter('upload_dir_carouselPartenaire'),
                        $newImageFile20
                    );
                } catch (FileException $e) {
                }
                $carouselPartenaire->setImage20($newImageFile20);
            }
            if ($imageFile21) {
                $imageFile21name = pathinfo($imageFile21->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile21name = $slugger->slug($imageFile21name);
                $newImageFile21 = $safeImageFile21name . '-' . uniqid('', false) . '.' . $imageFile21->guessExtension();

                try {
                    $imageFile21->move(
                        $this->getParameter('upload_dir_carouselPartenaire'),
                        $newImageFile21
                    );
                } catch (FileException $e) {
                }
                $carouselPartenaire->setImage21($newImageFile21);
            }
            if ($imageFile22) {
                $imageFile22name = pathinfo($imageFile22->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile22name = $slugger->slug($imageFile22name);
                $newImageFile22 = $safeImageFile22name . '-' . uniqid('', false) . '.' . $imageFile22->guessExtension();

                try {
                    $imageFile22->move(
                        $this->getParameter('upload_dir_carouselPartenaire'),
                        $newImageFile22
                    );
                } catch (FileException $e) {
                }
                $carouselPartenaire->setImage22($newImageFile22);
            }
            if ($imageFile23) {
                $imageFile23name = pathinfo($imageFile23->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile23name = $slugger->slug($imageFile23name);
                $newImageFile23 = $safeImageFile23name . '-' . uniqid('', false) . '.' . $imageFile23->guessExtension();

                try {
                    $imageFile23->move(
                        $this->getParameter('upload_dir_carouselPartenaire'),
                        $newImageFile23
                    );
                } catch (FileException $e) {
                }
                $carouselPartenaire->setImage23($newImageFile23);
            }
            if ($imageFile24) {
                $imageFile24name = pathinfo($imageFile24->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile24name = $slugger->slug($imageFile24name);
                $newImageFile24 = $safeImageFile24name . '-' . uniqid('', false) . '.' . $imageFile24->guessExtension();

                try {
                    $imageFile24->move(
                        $this->getParameter('upload_dir_carouselPartenaire'),
                        $newImageFile24
                    );
                } catch (FileException $e) {
                }
                $carouselPartenaire->setImage24($newImageFile24);
            }
            if ($imageFile25) {
                $imageFile25name = pathinfo($imageFile25->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile25name = $slugger->slug($imageFile25name);
                $newImageFile25 = $safeImageFile25name . '-' . uniqid('', false) . '.' . $imageFile25->guessExtension();

                try {
                    $imageFile25->move(
                        $this->getParameter('upload_dir_carouselPartenaire'),
                        $newImageFile25
                    );
                } catch (FileException $e) {
                }
                $carouselPartenaire->setImage25($newImageFile25);
            }
            if ($imageFile26) {
                $imageFile26name = pathinfo($imageFile26->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile26name = $slugger->slug($imageFile26name);
                $newImageFile26 = $safeImageFile26name . '-' . uniqid('', false) . '.' . $imageFile26->guessExtension();

                try {
                    $imageFile26->move(
                        $this->getParameter('upload_dir_carouselPartenaire'),
                        $newImageFile26
                    );
                } catch (FileException $e) {
                }
                $carouselPartenaire->setImage26($newImageFile26);
            }
            if ($imageFile27) {
                $imageFile27name = pathinfo($imageFile27->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile27name = $slugger->slug($imageFile27name);
                $newImageFile27 = $safeImageFile27name . '-' . uniqid('', false) . '.' . $imageFile27->guessExtension();

                try {
                    $imageFile27->move(
                        $this->getParameter('upload_dir_carouselPartenaire'),
                        $newImageFile27
                    );
                } catch (FileException $e) {
                }
                $carouselPartenaire->setImage27($newImageFile27);
            }
            if ($imageFile28) {
                $imageFile28name = pathinfo($imageFile28->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile28name = $slugger->slug($imageFile28name);
                $newImageFile28 = $safeImageFile28name . '-' . uniqid('', false) . '.' . $imageFile28->guessExtension();

                try {
                    $imageFile28->move(
                        $this->getParameter('upload_dir_carouselPartenaire'),
                        $newImageFile28
                    );
                } catch (FileException $e) {
                }
                $carouselPartenaire->setImage28($newImageFile28);
            }
            if ($imageFile29) {
                $imageFile29name = pathinfo($imageFile29->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile29name = $slugger->slug($imageFile29name);
                $newImageFile29 = $safeImageFile29name . '-' . uniqid('', false) . '.' . $imageFile29->guessExtension();

                try {
                    $imageFile29->move(
                        $this->getParameter('upload_dir_carouselPartenaire'),
                        $newImageFile29
                    );
                } catch (FileException $e) {
                }
                $carouselPartenaire->setImage29($newImageFile29);
            }
            if ($imageFile30) {
                $imageFile30name = pathinfo($imageFile30->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile30name = $slugger->slug($imageFile30name);
                $newImageFile30 = $safeImageFile30name . '-' . uniqid('', false) . '.' . $imageFile30->guessExtension();

                try {
                    $imageFile30->move(
                        $this->getParameter('upload_dir_carouselPartenaire'),
                        $newImageFile30
                    );
                } catch (FileException $e) {
                }
                $carouselPartenaire->setImage30($newImageFile30);
            }
            $entityManager->persist($carouselPartenaire);
            $entityManager->flush();

            return $this->redirectToRoute('admin_carousel_partenaire');
        }

        return $this->render('home/carousel_partenaire/new.html.twig', [
            'carousel_partenaire' => $carouselPartenaire,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/carousel/partenaire/show/{id}", name="home_carousel_partenaire_show", methods={"GET"})
     * @param CarouselPartenaire $carouselPartenaire
     * @return Response
     */
    public function show(CarouselPartenaire $carouselPartenaire): Response
    {
        return $this->render('home/carousel_partenaire/show.html.twig', [
            'carousel_partenaire' => $carouselPartenaire,
        ]);
    }

    /**
     * @Route("/carousel/partenaire/edit/{id}", name="home_carousel_partenaire_edit", methods={"GET","POST"})
     * @param Request $request
     * @param CarouselPartenaire $carouselPartenaire
     * @param SluggerInterface $slugger
     * @return Response
     */
    public function edit(Request $request, CarouselPartenaire $carouselPartenaire, SluggerInterface $slugger): Response
    {
        $form = $this->createForm(CarouselPartenaireType::class, $carouselPartenaire);
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
            $imageFile21 = $form->get('fileimage21')->getData();
            $imageFile22 = $form->get('fileimage22')->getData();
            $imageFile23 = $form->get('fileimage23')->getData();
            $imageFile24 = $form->get('fileimage24')->getData();
            $imageFile25 = $form->get('fileimage25')->getData();
            $imageFile26 = $form->get('fileimage26')->getData();
            $imageFile27 = $form->get('fileimage27')->getData();
            $imageFile28 = $form->get('fileimage28')->getData();
            $imageFile29 = $form->get('fileimage29')->getData();
            $imageFile30 = $form->get('fileimage30')->getData();
            if ($imageFile1 !== null) {
                $filename1 = $carouselPartenaire->getImage1();
                if ($filename1 !== '' && is_string($this->getParameter('upload_dir_carouselPartenaire'))) {
                    $path = $this->getParameter('upload_dir_carouselPartenaire') . $filename1;
                    unlink($path);
                }
                $imageFile1name = pathinfo($imageFile1->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile1name = $slugger->slug($imageFile1name);
                $newImageFile1 = $safeImageFile1name . '-' . uniqid('', false) . '.' . $imageFile1->guessExtension();

                try {
                    $imageFile1->move(
                        $this->getParameter('upload_dir_carouselPartenaire'),
                        $newImageFile1
                    );
                } catch (FileException $e) {
                }
                $carouselPartenaire->setImage1($newImageFile1);
            }
            if ($imageFile2 !== null) {
                $filename2 = $carouselPartenaire->getImage2();
                if ($filename2 !== '' && is_string($this->getParameter('upload_dir_carouselPartenaire'))) {
                    $path = $this->getParameter('upload_dir_carouselPartenaire') . $filename2;
                    unlink($path);
                }
                $imageFile2name = pathinfo($imageFile2->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile2name = $slugger->slug($imageFile2name);
                $newImageFile2 = $safeImageFile2name . '-' . uniqid('', false) . '.' . $imageFile2->guessExtension();

                try {
                    $imageFile2->move(
                        $this->getParameter('upload_dir_carouselPartenaire'),
                        $newImageFile2
                    );
                } catch (FileException $e) {
                }
                $carouselPartenaire->setImage2($newImageFile2);
            }
            if ($imageFile3 !== null) {
                $filename3 = $carouselPartenaire->getImage3();
                if ($filename3 !== '' && is_string($this->getParameter('upload_dir_carouselPartenaire'))) {
                    $path = $this->getParameter('upload_dir_carouselPartenaire') . $filename3;
                    unlink($path);
                }
                $imageFile3name = pathinfo($imageFile3->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile3name = $slugger->slug($imageFile3name);
                $newImageFile3 = $safeImageFile3name . '-' . uniqid('', false) . '.' . $imageFile3->guessExtension();

                try {
                    $imageFile3->move(
                        $this->getParameter('upload_dir_carouselPartenaire'),
                        $newImageFile3
                    );
                } catch (FileException $e) {
                }
                $carouselPartenaire->setImage3($newImageFile3);
            }
            if ($imageFile4 !== null) {
                $filename4 = $carouselPartenaire->getImage4();
                if ($filename4 !== '' && is_string($this->getParameter('upload_dir_carouselPartenaire'))) {
                    $path = $this->getParameter('upload_dir_carouselPartenaire') . $filename4;
                    unlink($path);
                }
                $imageFile4name = pathinfo($imageFile4->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile4name = $slugger->slug($imageFile4name);
                $newImageFile4 = $safeImageFile4name . '-' . uniqid('', false) . '.' . $imageFile4->guessExtension();

                try {
                    $imageFile4->move(
                        $this->getParameter('upload_dir_carouselPartenaire'),
                        $newImageFile4
                    );
                } catch (FileException $e) {
                }
                $carouselPartenaire->setImage4($newImageFile4);
            }
            if ($imageFile5 !== null) {
                $filename5 = $carouselPartenaire->getImage5();
                if ($filename5 !== '' && is_string($this->getParameter('upload_dir_carouselPartenaire'))) {
                    $path = $this->getParameter('upload_dir_carouselPartenaire') . $filename5;
                    unlink($path);
                }
                $imageFile5name = pathinfo($imageFile5->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile5name = $slugger->slug($imageFile5name);
                $newImageFile5 = $safeImageFile5name . '-' . uniqid('', false) . '.' . $imageFile5->guessExtension();

                try {
                    $imageFile5->move(
                        $this->getParameter('upload_dir_carouselPartenaire'),
                        $newImageFile5
                    );
                } catch (FileException $e) {
                }
                $carouselPartenaire->setImage5($newImageFile5);
            }
            if ($imageFile6 !== null) {
                $filename6 = $carouselPartenaire->getImage6();
                if ($filename6 !== '' && is_string($this->getParameter('upload_dir_carouselPartenaire'))) {
                    $path = $this->getParameter('upload_dir_carouselPartenaire') . $filename6;
                    unlink($path);
                }
                $imageFile6name = pathinfo($imageFile6->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile6name = $slugger->slug($imageFile6name);
                $newImageFile6 = $safeImageFile6name . '-' . uniqid('', false) . '.' . $imageFile6->guessExtension();

                try {
                    $imageFile6->move(
                        $this->getParameter('upload_dir_carouselPartenaire'),
                        $newImageFile6
                    );
                } catch (FileException $e) {
                }
                $carouselPartenaire->setImage6($newImageFile6);
            }
            if ($imageFile7 !== null) {
                $filename7 = $carouselPartenaire->getImage7();
                if ($filename7 !== '' && is_string($this->getParameter('upload_dir_carouselPartenaire'))) {
                    $path = $this->getParameter('upload_dir_carouselPartenaire') . $filename7;
                    unlink($path);
                }
                $imageFile7name = pathinfo($imageFile7->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile7name = $slugger->slug($imageFile7name);
                $newImageFile7 = $safeImageFile7name . '-' . uniqid('', false) . '.' . $imageFile7->guessExtension();

                try {
                    $imageFile7->move(
                        $this->getParameter('upload_dir_carouselPartenaire'),
                        $newImageFile7
                    );
                } catch (FileException $e) {
                }
                $carouselPartenaire->setImage7($newImageFile7);
            }
            if ($imageFile8 !== null) {
                $filename8 = $carouselPartenaire->getImage8();
                if ($filename8 !== '' && is_string($this->getParameter('upload_dir_carouselPartenaire'))) {
                    $path = $this->getParameter('upload_dir_carouselPartenaire') . $filename8;
                    unlink($path);
                }
                $imageFile8name = pathinfo($imageFile8->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile8name = $slugger->slug($imageFile8name);
                $newImageFile8 = $safeImageFile8name . '-' . uniqid('', false) . '.' . $imageFile8->guessExtension();

                try {
                    $imageFile8->move(
                        $this->getParameter('upload_dir_carouselPartenaire'),
                        $newImageFile8
                    );
                } catch (FileException $e) {
                }
                $carouselPartenaire->setImage8($newImageFile8);
            }
            if ($imageFile9 !== null) {
                $filename9 = $carouselPartenaire->getImage9();
                if ($filename9 !== '' && is_string($this->getParameter('upload_dir_carouselPartenaire'))) {
                    $path = $this->getParameter('upload_dir_carouselPartenaire') . $filename9;
                    unlink($path);
                }
                $imageFile9name = pathinfo($imageFile9->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile9name = $slugger->slug($imageFile9name);
                $newImageFile9 = $safeImageFile9name . '-' . uniqid('', false) . '.' . $imageFile9->guessExtension();

                try {
                    $imageFile9->move(
                        $this->getParameter('upload_dir_carouselPartenaire'),
                        $newImageFile9
                    );
                } catch (FileException $e) {
                }
                $carouselPartenaire->setImage9($newImageFile9);
            }
            if ($imageFile10 !== null) {
                $filename10 = $carouselPartenaire->getImage10();
                if ($filename10 !== '' && is_string($this->getParameter('upload_dir_carouselPartenaire'))) {
                    $path = $this->getParameter('upload_dir_carouselPartenaire') . $filename10;
                    unlink($path);
                }
                $imageFile10name = pathinfo($imageFile10->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile10name = $slugger->slug($imageFile10name);
                $newImageFile10 = $safeImageFile10name . '-' . uniqid('', false) . '.' . $imageFile10->guessExtension();

                try {
                    $imageFile10->move(
                        $this->getParameter('upload_dir_carouselPartenaire'),
                        $newImageFile10
                    );
                } catch (FileException $e) {
                }
                $carouselPartenaire->setImage10($newImageFile10);
            }
            if ($imageFile11 !== null) {
                $filename11 = $carouselPartenaire->getImage11();
                if ($filename11 !== '' && is_string($this->getParameter('upload_dir_carouselPartenaire'))) {
                    $path = $this->getParameter('upload_dir_carouselPartenaire') . $filename11;
                    unlink($path);
                }
                $imageFile11name = pathinfo($imageFile11->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile11name = $slugger->slug($imageFile11name);
                $newImageFile11 = $safeImageFile11name . '-' . uniqid('', false) . '.' . $imageFile11->guessExtension();

                try {
                    $imageFile11->move(
                        $this->getParameter('upload_dir_carouselPartenaire'),
                        $newImageFile11
                    );
                } catch (FileException $e) {
                }
                $carouselPartenaire->setImage11($newImageFile11);
            }
            if ($imageFile12 !== null) {
                $filename12 = $carouselPartenaire->getImage12();
                if ($filename12 !== '' && is_string($this->getParameter('upload_dir_carouselPartenaire'))) {
                    $path = $this->getParameter('upload_dir_carouselPartenaire') . $filename12;
                    unlink($path);
                }
                $imageFile12name = pathinfo($imageFile12->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile12name = $slugger->slug($imageFile12name);
                $newImageFile12 = $safeImageFile12name . '-' . uniqid('', false) . '.' . $imageFile12->guessExtension();

                try {
                    $imageFile12->move(
                        $this->getParameter('upload_dir_carouselPartenaire'),
                        $newImageFile12
                    );
                } catch (FileException $e) {
                }
                $carouselPartenaire->setImage12($newImageFile12);
            }
            if ($imageFile13 !== null) {
                $filename13 = $carouselPartenaire->getImage13();
                if ($filename13 !== '' && is_string($this->getParameter('upload_dir_carouselPartenaire'))) {
                    $path = $this->getParameter('upload_dir_carouselPartenaire') . $filename13;
                    unlink($path);
                }
                $imageFile13name = pathinfo($imageFile13->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile13name = $slugger->slug($imageFile13name);
                $newImageFile13 = $safeImageFile13name . '-' . uniqid('', false) . '.' . $imageFile13->guessExtension();

                try {
                    $imageFile13->move(
                        $this->getParameter('upload_dir_carouselPartenaire'),
                        $newImageFile13
                    );
                } catch (FileException $e) {
                }
                $carouselPartenaire->setImage13($newImageFile13);
            }
            if ($imageFile14 !== null) {
                $filename14 = $carouselPartenaire->getImage14();
                if ($filename14 !== '' && is_string($this->getParameter('upload_dir_carouselPartenaire'))) {
                    $path = $this->getParameter('upload_dir_carouselPartenaire') . $filename14;
                    unlink($path);
                }
                $imageFile14name = pathinfo($imageFile14->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile14name = $slugger->slug($imageFile14name);
                $newImageFile14 = $safeImageFile14name . '-' . uniqid('', false) . '.' . $imageFile14->guessExtension();

                try {
                    $imageFile14->move(
                        $this->getParameter('upload_dir_carouselPartenaire'),
                        $newImageFile14
                    );
                } catch (FileException $e) {
                }
                $carouselPartenaire->setImage14($newImageFile14);
            }
            if ($imageFile15 !== null) {
                $filename15 = $carouselPartenaire->getImage15();
                if ($filename15 !== '' && is_string($this->getParameter('upload_dir_carouselPartenaire'))) {
                    $path = $this->getParameter('upload_dir_carouselPartenaire') . $filename15;
                    unlink($path);
                }
                $imageFile15name = pathinfo($imageFile15->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile15name = $slugger->slug($imageFile15name);
                $newImageFile15 = $safeImageFile15name . '-' . uniqid('', false) . '.' . $imageFile15->guessExtension();

                try {
                    $imageFile15->move(
                        $this->getParameter('upload_dir_carouselPartenaire'),
                        $newImageFile15
                    );
                } catch (FileException $e) {
                }
                $carouselPartenaire->setImage15($newImageFile15);
            }
            if ($imageFile16 !== null) {
                $filename16 = $carouselPartenaire->getImage16();
                if ($filename16 !== '' && is_string($this->getParameter('upload_dir_carouselPartenaire'))) {
                    $path = $this->getParameter('upload_dir_carouselPartenaire') . $filename16;
                    unlink($path);
                }
                $imageFile16name = pathinfo($imageFile16->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile16name = $slugger->slug($imageFile16name);
                $newImageFile16 = $safeImageFile16name . '-' . uniqid('', false) . '.' . $imageFile16->guessExtension();

                try {
                    $imageFile16->move(
                        $this->getParameter('upload_dir_carouselPartenaire'),
                        $newImageFile16
                    );
                } catch (FileException $e) {
                }
                $carouselPartenaire->setImage16($newImageFile16);
            }
            if ($imageFile17 !== null) {
                $filename17 = $carouselPartenaire->getImage17();
                if ($filename17 !== '' && is_string($this->getParameter('upload_dir_carouselPartenaire'))) {
                    $path = $this->getParameter('upload_dir_carouselPartenaire') . $filename17;
                    unlink($path);
                }
                $imageFile17name = pathinfo($imageFile17->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile17name = $slugger->slug($imageFile17name);
                $newImageFile17 = $safeImageFile17name . '-' . uniqid('', false) . '.' . $imageFile17->guessExtension();

                try {
                    $imageFile17->move(
                        $this->getParameter('upload_dir_carouselPartenaire'),
                        $newImageFile17
                    );
                } catch (FileException $e) {
                }
                $carouselPartenaire->setImage17($newImageFile17);
            }
            if ($imageFile18 !== null) {
                $filename18 = $carouselPartenaire->getImage18();
                if ($filename18 !== '' && is_string($this->getParameter('upload_dir_carouselPartenaire'))) {
                    $path = $this->getParameter('upload_dir_carouselPartenaire') . $filename18;
                    unlink($path);
                }
                $imageFile18name = pathinfo($imageFile18->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile18name = $slugger->slug($imageFile18name);
                $newImageFile18 = $safeImageFile18name . '-' . uniqid('', false) . '.' . $imageFile18->guessExtension();

                try {
                    $imageFile18->move(
                        $this->getParameter('upload_dir_carouselPartenaire'),
                        $newImageFile18
                    );
                } catch (FileException $e) {
                }
                $carouselPartenaire->setImage18($newImageFile18);
            }
            if ($imageFile19 !== null) {
                $filename19 = $carouselPartenaire->getImage19();
                if ($filename19 !== '' && is_string($this->getParameter('upload_dir_carouselPartenaire'))) {
                    $path = $this->getParameter('upload_dir_carouselPartenaire') . $filename19;
                    unlink($path);
                }
                $imageFile19name = pathinfo($imageFile19->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile19name = $slugger->slug($imageFile19name);
                $newImageFile19 = $safeImageFile19name . '-' . uniqid('', false) . '.' . $imageFile19->guessExtension();

                try {
                    $imageFile19->move(
                        $this->getParameter('upload_dir_carouselPartenaire'),
                        $newImageFile19
                    );
                } catch (FileException $e) {
                }
                $carouselPartenaire->setImage19($newImageFile19);
            }
            if ($imageFile20 !== null) {
                $filename20 = $carouselPartenaire->getImage20();
                if ($filename20 !== '' && is_string($this->getParameter('upload_dir_carouselPartenaire'))) {
                    $path = $this->getParameter('upload_dir_carouselPartenaire') . $filename20;
                    unlink($path);
                }
                $imageFile20name = pathinfo($imageFile20->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile20name = $slugger->slug($imageFile20name);
                $newImageFile20 = $safeImageFile20name . '-' . uniqid('', false) . '.' . $imageFile20->guessExtension();

                try {
                    $imageFile20->move(
                        $this->getParameter('upload_dir_carouselPartenaire'),
                        $newImageFile20
                    );
                } catch (FileException $e) {
                }
                $carouselPartenaire->setImage20($newImageFile20);
            }
            if ($imageFile21 !== null) {
                $filename21 = $carouselPartenaire->getImage21();
                if ($filename21 !== '' && is_string($this->getParameter('upload_dir_carouselPartenaire'))) {
                    $path = $this->getParameter('upload_dir_carouselPartenaire') . $filename21;
                    unlink($path);
                }
                $imageFile21name = pathinfo($imageFile21->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile21name = $slugger->slug($imageFile21name);
                $newImageFile21 = $safeImageFile21name . '-' . uniqid('', false) . '.' . $imageFile21->guessExtension();

                try {
                    $imageFile21->move(
                        $this->getParameter('upload_dir_carouselPartenaire'),
                        $newImageFile21
                    );
                } catch (FileException $e) {
                }
                $carouselPartenaire->setImage21($newImageFile21);
            }
            if ($imageFile22 !== null) {
                $filename22 = $carouselPartenaire->getImage22();
                if ($filename22 !== '' && is_string($this->getParameter('upload_dir_carouselPartenaire'))) {
                    $path = $this->getParameter('upload_dir_carouselPartenaire') . $filename22;
                    unlink($path);
                }
                $imageFile22name = pathinfo($imageFile22->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile22name = $slugger->slug($imageFile22name);
                $newImageFile22 = $safeImageFile22name . '-' . uniqid('', false) . '.' . $imageFile22->guessExtension();

                try {
                    $imageFile22->move(
                        $this->getParameter('upload_dir_carouselPartenaire'),
                        $newImageFile22
                    );
                } catch (FileException $e) {
                }
                $carouselPartenaire->setImage22($newImageFile22);
            }
            if ($imageFile23 !== null) {
                $filename23 = $carouselPartenaire->getImage23();
                if ($filename23 !== '' && is_string($this->getParameter('upload_dir_carouselPartenaire'))) {
                    $path = $this->getParameter('upload_dir_carouselPartenaire') . $filename23;
                    unlink($path);
                }
                $imageFile23name = pathinfo($imageFile23->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile23name = $slugger->slug($imageFile23name);
                $newImageFile23 = $safeImageFile23name . '-' . uniqid('', false) . '.' . $imageFile23->guessExtension();

                try {
                    $imageFile23->move(
                        $this->getParameter('upload_dir_carouselPartenaire'),
                        $newImageFile23
                    );
                } catch (FileException $e) {
                }
                $carouselPartenaire->setImage23($newImageFile23);
            }
            if ($imageFile24 !== null) {
                $filename24 = $carouselPartenaire->getImage24();
                if ($filename24 !== '' && is_string($this->getParameter('upload_dir_carouselPartenaire'))) {
                    $path = $this->getParameter('upload_dir_carouselPartenaire') . $filename24;
                    unlink($path);
                }
                $imageFile24name = pathinfo($imageFile24->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile24name = $slugger->slug($imageFile24name);
                $newImageFile24 = $safeImageFile24name . '-' . uniqid('', false) . '.' . $imageFile24->guessExtension();

                try {
                    $imageFile24->move(
                        $this->getParameter('upload_dir_carouselPartenaire'),
                        $newImageFile24
                    );
                } catch (FileException $e) {
                }
                $carouselPartenaire->setImage24($newImageFile24);
            }
            if ($imageFile25 !== null) {
                $filename25 = $carouselPartenaire->getImage25();
                if ($filename25 !== '' && is_string($this->getParameter('upload_dir_carouselPartenaire'))) {
                    $path = $this->getParameter('upload_dir_carouselPartenaire') . $filename25;
                    unlink($path);
                }
                $imageFile25name = pathinfo($imageFile25->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile25name = $slugger->slug($imageFile25name);
                $newImageFile25 = $safeImageFile25name . '-' . uniqid('', false) . '.' . $imageFile25->guessExtension();

                try {
                    $imageFile25->move(
                        $this->getParameter('upload_dir_carouselPartenaire'),
                        $newImageFile25
                    );
                } catch (FileException $e) {
                }
                $carouselPartenaire->setImage25($newImageFile25);
            }
            if ($imageFile26 !== null) {
                $filename26 = $carouselPartenaire->getImage26();
                if ($filename26 !== '' && is_string($this->getParameter('upload_dir_carouselPartenaire'))) {
                    $path = $this->getParameter('upload_dir_carouselPartenaire') . $filename26;
                    unlink($path);
                }
                $imageFile26name = pathinfo($imageFile26->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile26name = $slugger->slug($imageFile26name);
                $newImageFile26 = $safeImageFile26name . '-' . uniqid('', false) . '.' . $imageFile26->guessExtension();

                try {
                    $imageFile26->move(
                        $this->getParameter('upload_dir_carouselPartenaire'),
                        $newImageFile26
                    );
                } catch (FileException $e) {
                }
                $carouselPartenaire->setImage26($newImageFile26);
            }
            if ($imageFile27 !== null) {
                $filename27 = $carouselPartenaire->getImage27();
                if ($filename27 !== '' && is_string($this->getParameter('upload_dir_carouselPartenaire'))) {
                    $path = $this->getParameter('upload_dir_carouselPartenaire') . $filename27;
                    unlink($path);
                }
                $imageFile27name = pathinfo($imageFile27->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile27name = $slugger->slug($imageFile27name);
                $newImageFile27 = $safeImageFile27name . '-' . uniqid('', false) . '.' . $imageFile27->guessExtension();

                try {
                    $imageFile27->move(
                        $this->getParameter('upload_dir_carouselPartenaire'),
                        $newImageFile27
                    );
                } catch (FileException $e) {
                }
                $carouselPartenaire->setImage27($newImageFile27);
            }
            if ($imageFile28 !== null) {
                $filename28 = $carouselPartenaire->getImage28();
                if ($filename28 !== '' && is_string($this->getParameter('upload_dir_carouselPartenaire'))) {
                    $path = $this->getParameter('upload_dir_carouselPartenaire') . $filename28;
                    unlink($path);
                }
                $imageFile28name = pathinfo($imageFile28->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile28name = $slugger->slug($imageFile28name);
                $newImageFile28 = $safeImageFile28name . '-' . uniqid('', false) . '.' . $imageFile28->guessExtension();

                try {
                    $imageFile28->move(
                        $this->getParameter('upload_dir_carouselPartenaire'),
                        $newImageFile28
                    );
                } catch (FileException $e) {
                }
                $carouselPartenaire->setImage28($newImageFile28);
            }
            if ($imageFile29 !== null) {
                $filename29 = $carouselPartenaire->getImage29();
                if ($filename29 !== '' && is_string($this->getParameter('upload_dir_carouselPartenaire'))) {
                    $path = $this->getParameter('upload_dir_carouselPartenaire') . $filename29;
                    unlink($path);
                }
                $imageFile29name = pathinfo($imageFile29->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile29name = $slugger->slug($imageFile29name);
                $newImageFile29 = $safeImageFile29name . '-' . uniqid('', false) . '.' . $imageFile29->guessExtension();

                try {
                    $imageFile29->move(
                        $this->getParameter('upload_dir_carouselPartenaire'),
                        $newImageFile29
                    );
                } catch (FileException $e) {
                }
                $carouselPartenaire->setImage29($newImageFile29);
            }
            if ($imageFile30 !== null) {
                $filename30 = $carouselPartenaire->getImage30();
                if ($filename30 !== '' && is_string($this->getParameter('upload_dir_carouselPartenaire'))) {
                    $path = $this->getParameter('upload_dir_carouselPartenaire') . $filename30;
                    unlink($path);
                }
                $imageFile30name = pathinfo($imageFile30->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageFile30name = $slugger->slug($imageFile30name);
                $newImageFile30 = $safeImageFile30name . '-' . uniqid('', false) . '.' . $imageFile30->guessExtension();

                try {
                    $imageFile30->move(
                        $this->getParameter('upload_dir_carouselPartenaire'),
                        $newImageFile30
                    );
                } catch (FileException $e) {
                }
                $carouselPartenaire->setImage30($newImageFile30);
            }
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_carousel_partenaire');
        }

        return $this->render('home/carousel_partenaire/edit.html.twig', [
            'carousel_partenaire' => $carouselPartenaire,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/carousel/partenaire/delete/{id}", name="home_carousel_partenaire_delete", methods={"DELETE"})
     * @param Request $request
     * @param CarouselPartenaire $carouselPartenaire
     * @param EntityManagerInterface $entityManager
     * @return Response
     */
    public function delete(
        Request $request,
        CarouselPartenaire $carouselPartenaire,
        EntityManagerInterface $entityManager
    ): Response {
        if ($this->isCsrfTokenValid('delete' . $carouselPartenaire->getId(), $request->request->get('_token'))) {
            $filename1 = $carouselPartenaire->getImage1();
            if ($filename1 !== '' && is_string($this->getParameter('upload_dir_carouselPartenaire'))) {
                $path = $this->getParameter('upload_dir_carouselPartenaire') . $filename1;
                unlink($path);
            }
            $filename2 = $carouselPartenaire->getImage2();
            if ($filename2 !== '' && is_string($this->getParameter('upload_dir_carouselPartenaire'))) {
                $path = $this->getParameter('upload_dir_carouselPartenaire') . $filename2;
                unlink($path);
            }
            $filename3 = $carouselPartenaire->getImage3();
            if ($filename3 !== '' && is_string($this->getParameter('upload_dir_carouselPartenaire'))) {
                $path = $this->getParameter('upload_dir_carouselPartenaire') . $filename3;
                unlink($path);
            }
            $filename4 = $carouselPartenaire->getImage4();
            if ($filename4 !== '' && is_string($this->getParameter('upload_dir_carouselPartenaire'))) {
                $path = $this->getParameter('upload_dir_carouselPartenaire') . $filename4;
                unlink($path);
            }
            $filename5 = $carouselPartenaire->getImage5();
            if ($filename5 !== '' && is_string($this->getParameter('upload_dir_carouselPartenaire'))) {
                $path = $this->getParameter('upload_dir_carouselPartenaire') . $filename5;
                unlink($path);
            }
            $filename6 = $carouselPartenaire->getImage6();
            if ($filename6 !== '' && is_string($this->getParameter('upload_dir_carouselPartenaire'))) {
                $path = $this->getParameter('upload_dir_carouselPartenaire') . $filename6;
                unlink($path);
            }
            $filename7 = $carouselPartenaire->getImage7();
            if ($filename7 !== '' && is_string($this->getParameter('upload_dir_carouselPartenaire'))) {
                $path = $this->getParameter('upload_dir_carouselPartenaire') . $filename7;
                unlink($path);
            }
            $filename8 = $carouselPartenaire->getImage8();
            if ($filename8 !== '' && is_string($this->getParameter('upload_dir_carouselPartenaire'))) {
                $path = $this->getParameter('upload_dir_carouselPartenaire') . $filename8;
                unlink($path);
            }
            $filename9 = $carouselPartenaire->getImage9();
            if ($filename9 !== '' && is_string($this->getParameter('upload_dir_carouselPartenaire'))) {
                $path = $this->getParameter('upload_dir_carouselPartenaire') . $filename9;
                unlink($path);
            }
            $filename10 = $carouselPartenaire->getImage10();
            if ($filename10 !== '' && is_string($this->getParameter('upload_dir_carouselPartenaire'))) {
                $path = $this->getParameter('upload_dir_carouselPartenaire') . $filename10;
                unlink($path);
            }
            $filename11 = $carouselPartenaire->getImage11();
            if ($filename11 !== '' && is_string($this->getParameter('upload_dir_carouselPartenaire'))) {
                $path = $this->getParameter('upload_dir_carouselPartenaire') . $filename11;
                unlink($path);
            }
            $filename12 = $carouselPartenaire->getImage12();
            if ($filename12 !== '' && is_string($this->getParameter('upload_dir_carouselPartenaire'))) {
                $path = $this->getParameter('upload_dir_carouselPartenaire') . $filename12;
                unlink($path);
            }
            $filename13 = $carouselPartenaire->getImage13();
            if ($filename13 !== '' && is_string($this->getParameter('upload_dir_carouselPartenaire'))) {
                $path = $this->getParameter('upload_dir_carouselPartenaire') . $filename13;
                unlink($path);
            }
            $filename14 = $carouselPartenaire->getImage14();
            if ($filename14 !== '' && is_string($this->getParameter('upload_dir_carouselPartenaire'))) {
                $path = $this->getParameter('upload_dir_carouselPartenaire') . $filename14;
                unlink($path);
            }
            $filename15 = $carouselPartenaire->getImage15();
            if ($filename15 !== '' && is_string($this->getParameter('upload_dir_carouselPartenaire'))) {
                $path = $this->getParameter('upload_dir_carouselPartenaire') . $filename15;
                unlink($path);
            }
            $filename16 = $carouselPartenaire->getImage16();
            if ($filename16 !== '' && is_string($this->getParameter('upload_dir_carouselPartenaire'))) {
                $path = $this->getParameter('upload_dir_carouselPartenaire') . $filename16;
                unlink($path);
            }
            $filename17 = $carouselPartenaire->getImage17();
            if ($filename17 !== '' && is_string($this->getParameter('upload_dir_carouselPartenaire'))) {
                $path = $this->getParameter('upload_dir_carouselPartenaire') . $filename17;
                unlink($path);
            }
            $filename18 = $carouselPartenaire->getImage18();
            if ($filename18 !== '' && is_string($this->getParameter('upload_dir_carouselPartenaire'))) {
                $path = $this->getParameter('upload_dir_carouselPartenaire') . $filename18;
                unlink($path);
            }
            $filename19 = $carouselPartenaire->getImage19();
            if ($filename19 !== '' && is_string($this->getParameter('upload_dir_carouselPartenaire'))) {
                $path = $this->getParameter('upload_dir_carouselPartenaire') . $filename19;
                unlink($path);
            }
            $filename20 = $carouselPartenaire->getImage20();
            if ($filename20 !== '' && is_string($this->getParameter('upload_dir_carouselPartenaire'))) {
                $path = $this->getParameter('upload_dir_carouselPartenaire') . $filename20;
                unlink($path);
            }
            $filename21 = $carouselPartenaire->getImage21();
            if ($filename21 !== '' && is_string($this->getParameter('upload_dir_carouselPartenaire'))) {
                $path = $this->getParameter('upload_dir_carouselPartenaire') . $filename21;
                unlink($path);
            }
            $filename22 = $carouselPartenaire->getImage22();
            if ($filename22 !== '' && is_string($this->getParameter('upload_dir_carouselPartenaire'))) {
                $path = $this->getParameter('upload_dir_carouselPartenaire') . $filename22;
                unlink($path);
            }
            $filename23 = $carouselPartenaire->getImage23();
            if ($filename23 !== '' && is_string($this->getParameter('upload_dir_carouselPartenaire'))) {
                $path = $this->getParameter('upload_dir_carouselPartenaire') . $filename23;
                unlink($path);
            }
            $filename24 = $carouselPartenaire->getImage24();
            if ($filename24 !== '' && is_string($this->getParameter('upload_dir_carouselPartenaire'))) {
                $path = $this->getParameter('upload_dir_carouselPartenaire') . $filename24;
                unlink($path);
            }
            $filename25 = $carouselPartenaire->getImage25();
            if ($filename25 !== '' && is_string($this->getParameter('upload_dir_carouselPartenaire'))) {
                $path = $this->getParameter('upload_dir_carouselPartenaire') . $filename25;
                unlink($path);
            }
            $filename26 = $carouselPartenaire->getImage26();
            if ($filename26 !== '' && is_string($this->getParameter('upload_dir_carouselPartenaire'))) {
                $path = $this->getParameter('upload_dir_carouselPartenaire') . $filename26;
                unlink($path);
            }
            $filename27 = $carouselPartenaire->getImage27();
            if ($filename27 !== '' && is_string($this->getParameter('upload_dir_carouselPartenaire'))) {
                $path = $this->getParameter('upload_dir_carouselPartenaire') . $filename27;
                unlink($path);
            }
            $filename28 = $carouselPartenaire->getImage28();
            if ($filename28 !== '' && is_string($this->getParameter('upload_dir_carouselPartenaire'))) {
                $path = $this->getParameter('upload_dir_carouselPartenaire') . $filename28;
                unlink($path);
            }
            $filename29 = $carouselPartenaire->getImage29();
            if ($filename29 !== '' && is_string($this->getParameter('upload_dir_carouselPartenaire'))) {
                $path = $this->getParameter('upload_dir_carouselPartenaire') . $filename29;
                unlink($path);
            }
            $filename30 = $carouselPartenaire->getImage30();
            if ($filename30 !== '' && is_string($this->getParameter('upload_dir_carouselPartenaire'))) {
                $path = $this->getParameter('upload_dir_carouselPartenaire') . $filename30;
                unlink($path);
            }
            $entityManager->remove($carouselPartenaire);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_carousel_partenaire');
    }
}
