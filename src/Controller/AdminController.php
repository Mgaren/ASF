<?php

namespace App\Controller;

use App\Repository\AdherantImageRepository;
use App\Repository\AdherantTextRepository;
use App\Repository\ContactHoraireRepository;
use App\Repository\SectionRepository;
use App\Repository\VerticalHistoryRepository;
use App\Repository\DirigeantsRepository;
use App\Repository\SalariesRepository;
use App\Repository\DirigeantsPostRepository;
use App\Repository\SectionSalaryRepository;
use App\Repository\PresidentRepository;
use App\Repository\CarouselHistoryRepository;
use App\Repository\CarouselSectionRepository;
use App\Repository\CarouselPartenaireRepository;
use App\Repository\HistoryRepository;
use App\Repository\ActualityRepository;
use App\Repository\PartenaireRepository;
use App\Repository\HomeAsfRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
* class AdminController
* @package App\Controller
* @Route("/admin", name="admin_")
*/
class AdminController extends AbstractController
{
    /**
     * @Route("/index", name="index")
     * @return Response
     */
    public function index(): Response
    {
        return $this->render('admin/index.html.twig');
    }

    /**
     * @Route("/homeSection", name="homeSection", methods={"GET"})
     * @param Request $request
     * @param SectionRepository $sectionRepository
     * @param PaginatorInterface $paginator
     * @return Response
     */
    public function homeSection(
        Request $request,
        SectionRepository $sectionRepository,
        PaginatorInterface $paginator
    ): Response {
        $sections = $sectionRepository->findBy([], [
            'titre' => 'ASC'
        ]);
        $sections = $paginator->paginate(
            $sections,
            $request->query->getInt('page', 1),
            10
        );
        return $this->render('admin/homeSection.html.twig', [
            'sections' => $sections
        ]);
    }

    /**
     * @Route("/verticalHistory", name="verticalHistory", methods={"GET"})
     * @param Request $request
     * @param VerticalHistoryRepository $vertHistRepository
     * @param PaginatorInterface $paginator
     * @return Response
     */
    public function verticalHistory(
        Request $request,
        VerticalHistoryRepository $vertHistRepository,
        PaginatorInterface $paginator
    ): Response {
        $verticalHistory = $vertHistRepository->findBy([], [
            'titre' => 'ASC'
        ]);
        $verticalHistory = $paginator->paginate(
            $verticalHistory,
            $request->query->getInt('page', 1),
            10
        );
        return $this->render('admin/verticalHistory.html.twig', [
            'verticalHistorys' => $verticalHistory
        ]);
    }

    /**
     * @Route("/dirigeants", name="dirigeants", methods={"GET"})
     * @param Request $request
     * @param DirigeantsRepository $dirigeantsRepository
     * @param PaginatorInterface $paginator
     * @return Response
     */
    public function dirigeantAsf(
        Request $request,
        DirigeantsRepository $dirigeantsRepository,
        PaginatorInterface $paginator
    ): Response {
        $dirigeants = $dirigeantsRepository->findBy([], [
            'id' => 'ASC'
        ]);
        $dirigeants = $paginator->paginate(
            $dirigeants,
            $request->query->getInt('page', 1),
            10
        );
        return $this->render('admin/dirigeantsAsf.html.twig', [
            'dirigeants' => $dirigeants
        ]);
    }

    /**
     * @Route("/salaries", name="salaries", methods={"GET"})
     * @param Request $request
     * @param SalariesRepository $salariesRepository
     * @param PaginatorInterface $paginator
     * @return Response
     */
    public function salariesAsf(
        Request $request,
        SalariesRepository $salariesRepository,
        PaginatorInterface $paginator
    ): Response {
        $salaries = $salariesRepository->findBy([], [
            'lastname' => 'ASC'
        ]);
        $salaries = $paginator->paginate(
            $salaries,
            $request->query->getInt('page', 1),
            10
        );
        return $this->render('admin/salariesAsf.html.twig', [
            'salaries' => $salaries
        ]);
    }

    /**
     * @Route("/adherant", name="adherant", methods={"GET"})
     * @param Request $request
     * @param AdherantImageRepository $imageRepository
     * @param AdherantTextRepository $textRepository
     * @param PaginatorInterface $paginator
     * @return Response
     */
    public function carteAdherant(
        Request $request,
        AdherantImageRepository $imageRepository,
        AdherantTextRepository $textRepository,
        PaginatorInterface $paginator
    ): Response {
        $adherantImages = $imageRepository->findAll();
        $adherantTexts = $textRepository->findAll();
        $adherantImages = $paginator->paginate(
            $adherantImages,
            $request->query->getInt('page', 1),
            5
        );
        $adherantTexts = $paginator->paginate(
            $adherantTexts,
            $request->query->getInt('page', 1),
            5
        );
        return $this->render('admin/adherant.html.twig', [
            'adherant_images' => $adherantImages,
            'adherant_texts' => $adherantTexts
        ]);
    }

    /**
     * @Route("/contact", name="contact_horaire", methods={"GET"})
     * @param Request $request
     * @param ContactHoraireRepository $horaireRepository
     * @param PaginatorInterface $paginator
     * @return Response
     */
    public function contact(
        Request $request,
        ContactHoraireRepository $horaireRepository,
        PaginatorInterface $paginator
    ): Response {
        $horaires = $horaireRepository->findBy([], [
            'id' => 'ASC'
        ]);
        $horaires = $paginator->paginate(
            $horaires,
            $request->query->getInt('page', 1),
            10
        );
        return $this->render('admin/contactHoraire.html.twig', [
            'contact_horaires' => $horaires
        ]);
    }

    /**
     * @Route("/dirigeants/post", name="dirigeants_post", methods={"GET"})
     * @param Request $request
     * @param DirigeantsPostRepository $postRepository
     * @param PaginatorInterface $paginator
     * @return Response
     */
    public function addPost(
        Request $request,
        DirigeantsPostRepository $postRepository,
        PaginatorInterface $paginator
    ): Response {
        $posts = $postRepository->findAll();
        $posts = $paginator->paginate(
            $posts,
            $request->query->getInt('page', 1),
            10
        );
        return $this->render('admin/dirigeantsPost.html.twig', [
            'dirigeants_posts' => $posts
        ]);
    }

    /**
     * @Route("/section/salary", name="section_salary", methods={"GET"})
     * @param Request $request
     * @param SectionSalaryRepository $salaryRepository
     * @param PaginatorInterface $paginator
     * @return Response
     */
    public function addSection(
        Request $request,
        SectionSalaryRepository $salaryRepository,
        PaginatorInterface $paginator
    ): Response {
        $sections = $salaryRepository->findBy([], [
            'name' => 'ASC',
        ]);
        $sections = $paginator->paginate(
            $sections,
            $request->query->getInt('page', 1),
            10
        );
        return $this->render('admin/sectionSalary.html.twig', [
            'section_salaries' => $sections
        ]);
    }

    /**
     * @Route("/president", name="president", methods={"GET"})
     * @param Request $request
     * @param PresidentRepository $presidentRepository
     * @param PaginatorInterface $paginator
     * @return Response
     */
    public function addPresident(
        Request $request,
        PresidentRepository $presidentRepository,
        PaginatorInterface $paginator
    ): Response {
        $presidents = $presidentRepository->findBy([], [
            'date' => 'ASC',
        ]);
        $presidents = $paginator->paginate(
            $presidents,
            $request->query->getInt('page', 1),
            10
        );
        return $this->render('admin/president.html.twig', [
            'presidents' => $presidents
        ]);
    }

    /**
     * @Route("/carousel/history", name="carousel_history", methods={"GET"})
     * @param Request $request
     * @param CarouselHistoryRepository $carouselHistory
     * @param PaginatorInterface $paginator
     * @return Response
     */
    public function carouselHistory(
        Request $request,
        CarouselHistoryRepository $carouselHistory,
        PaginatorInterface $paginator
    ): Response {
        $carouselHistories = $carouselHistory->findAll();
        $carouselHistories = $paginator->paginate(
            $carouselHistories,
            $request->query->getInt('page', 1),
            10
        );
        return $this->render('admin/carouselHistory.html.twig', [
            'carousel_history' => $carouselHistories
        ]);
    }

    /**
     * @Route("/carousel/section", name="carousel_section", methods={"GET"})
     * @param Request $request
     * @param CarouselSectionRepository $carouselSection
     * @param PaginatorInterface $paginator
     * @return Response
     */
    public function carouselSection(
        Request $request,
        CarouselSectionRepository $carouselSection,
        PaginatorInterface $paginator
    ): Response {
        $carouselSections = $carouselSection->findAll();
        $carouselSections = $paginator->paginate(
            $carouselSections,
            $request->query->getInt('page', 1),
            10
        );
        return $this->render('admin/carouselSection.html.twig', [
            'carousel_section' => $carouselSections
        ]);
    }

    /**
     * @Route("/carousel/partenaire", name="carousel_partenaire", methods={"GET"})
     * @param Request $request
     * @param CarouselPartenaireRepository $carouselPartenaire
     * @param PaginatorInterface $paginator
     * @return Response
     */
    public function carouselPartenaire(
        Request $request,
        CarouselPartenaireRepository $carouselPartenaire,
        PaginatorInterface $paginator
    ): Response {
        $carouselPartenaires = $carouselPartenaire->findAll();
        $carouselPartenaires = $paginator->paginate(
            $carouselPartenaires,
            $request->query->getInt('page', 1),
            10
        );
        return $this->render('admin/carouselPartenaire.html.twig', [
            'carousel_partenaire' => $carouselPartenaires
        ]);
    }

    /**
     * @Route("/history", name="history", methods={"GET"})
     * @param Request $request
     * @param HistoryRepository $historyRepository
     * @param PaginatorInterface $paginator
     * @return Response
     */
    public function history(
        Request $request,
        HistoryRepository $historyRepository,
        PaginatorInterface $paginator
    ): Response {
        $history = $historyRepository->findBy([], [
            'date' => 'ASC'
        ]);
        $history = $paginator->paginate(
            $history,
            $request->query->getInt('page', 1),
            10
        );
        return $this->render('admin/history.html.twig', [
            'historys' => $history
        ]);
    }

    /**
     * @Route("/actuality", name="actuality", methods={"GET"})
     * @param Request $request
     * @param ActualityRepository $actualityRepository
     * @param PaginatorInterface $paginator
     * @return Response
     */
    public function actuality(
        Request $request,
        ActualityRepository $actualityRepository,
        PaginatorInterface $paginator
    ): Response {
        $actuality = $actualityRepository->findBy([], [
            'id' => 'DESC'
        ]);
        $actuality = $paginator->paginate(
            $actuality,
            $request->query->getInt('page', 1),
            10
        );
        return $this->render('admin/actuality.html.twig', [
            'actualitys' => $actuality
        ]);
    }

    /**
     * @Route("/partenaire", name="partenaire", methods={"GET"})
     * @param Request $request
     * @param PartenaireRepository $partenaireRepository
     * @param PaginatorInterface $paginator
     * @return Response
     */
    public function partenaire(
        Request $request,
        PartenaireRepository $partenaireRepository,
        PaginatorInterface $paginator
    ): Response {
        $partenaire = $partenaireRepository->findBy([], [
            'name' => 'ASC'
        ]);
        $partenaire = $paginator->paginate(
            $partenaire,
            $request->query->getInt('page', 1),
            10
        );
        return $this->render('admin/partenaire.html.twig', [
            'partenaires' => $partenaire
        ]);
    }

    /**
     * @Route("/homeAsf", name="homeAsf", methods={"GET"})
     * @param Request $request
     * @param HomeAsfRepository $homeAsfRepository
     * @param PaginatorInterface $paginator
     * @return Response
     */
    public function homeAsf(
        Request $request,
        HomeAsfRepository $homeAsfRepository,
        PaginatorInterface $paginator
    ): Response {
        $homeAsf = $homeAsfRepository->findBy([], [
            'id' => 'ASC'
        ]);
        $homeAsf = $paginator->paginate(
            $homeAsf,
            $request->query->getInt('page', 1),
            10
        );
        return $this->render('admin/homeAsf.html.twig', [
            'home_asfs' => $homeAsf
        ]);
    }
}
