<?php

namespace App\Controller;

use App\Repository\AdherantImageRepository;
use App\Repository\AdherantTextRepository;
use App\Repository\ContactHoraireRepository;
use App\Repository\HomeSectionRepository;
use App\Repository\VerticalHistoryRepository;
use App\Repository\DirigeantsRepository;
use App\Repository\SalariesRepository;
use App\Repository\DirigeantsPostRepository;
use App\Repository\SectionRepository;
use App\Repository\PresidentRepository;
use App\Repository\CarouselHistoryRepository;
use App\Repository\CarouselSectionRepository;
use App\Repository\CarouselPartenaireRepository;
use App\Repository\HistoryRepository;
use App\Repository\ActualityRepository;
use App\Repository\PartenaireRepository;
use App\Repository\HomeAsfRepository;
use App\Repository\PartenaireCategoryRepository;
use App\Repository\AdherantPartenaireRepository;
use App\Repository\HistoryDateRepository;
use App\Repository\CguRepository;
use App\Repository\ItemRepository;
use App\Repository\CguCategoryRepository;
use App\Service\AdminSectionGenerator;
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
     * @param AdminSectionGenerator $generator
     * @return Response
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function index(AdminSectionGenerator $generator): Response
    {
        $htmlNav = $generator->getAdminSectionGenerator();
        return $this->render('admin/layout.html.twig', [
            'html_nav' => $htmlNav,
        ]);
    }

    /**
     * @Route("/homeSection", name="homeSection", methods={"GET"})
     * @param Request $request
     * @param HomeSectionRepository $homeSectionRep
     * @param PaginatorInterface $paginator
     * @param AdminSectionGenerator $generator
     * @return Response
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function homeSection(
        Request $request,
        HomeSectionRepository $homeSectionRep,
        PaginatorInterface $paginator,
        AdminSectionGenerator $generator
    ): Response {
        $homeSections = $homeSectionRep->findAll();
        $sectionsOrdered = [];
        foreach ($homeSections as $homeSection) {
            $sectionsOrdered[$homeSection->getSection()->getName()] = $homeSection;
        }
        ksort($sectionsOrdered);
        $homeSections = $paginator->paginate(
            $sectionsOrdered,
            $request->query->getInt('page', 1),
            10
        );
        $htmlNav = $generator->getAdminSectionGenerator();
        return $this->render('admin/homeSection.html.twig', [
            'home_sections' => $homeSections,
            'html_nav' => $htmlNav,
        ]);
    }

    /**
     * @Route("/verticalHistory", name="verticalHistory", methods={"GET"})
     * @param Request $request
     * @param VerticalHistoryRepository $vertHistRepository
     * @param PaginatorInterface $paginator
     * @param AdminSectionGenerator $generator
     * @return Response
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function verticalHistory(
        Request $request,
        VerticalHistoryRepository $vertHistRepository,
        PaginatorInterface $paginator,
        AdminSectionGenerator $generator
    ): Response {
        $verticalHistory = $vertHistRepository->findBy([], [
            'date' => 'ASC'
        ]);
        $verticalHistory = $paginator->paginate(
            $verticalHistory,
            $request->query->getInt('page', 1),
            10
        );
        $htmlNav = $generator->getAdminSectionGenerator();
        return $this->render('admin/verticalHistory.html.twig', [
            'verticalHistorys' => $verticalHistory,
            'html_nav' => $htmlNav,
        ]);
    }

    /**
     * @Route("/dirigeants", name="dirigeants", methods={"GET"})
     * @param Request $request
     * @param DirigeantsRepository $dirigeantsRepository
     * @param PaginatorInterface $paginator
     * @param AdminSectionGenerator $generator
     * @return Response
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function dirigeantAsf(
        Request $request,
        DirigeantsRepository $dirigeantsRepository,
        PaginatorInterface $paginator,
        AdminSectionGenerator $generator
    ): Response {
        $dirigeants = $dirigeantsRepository->findBy([], [
            'id' => 'ASC'
        ]);
        $dirigeants = $paginator->paginate(
            $dirigeants,
            $request->query->getInt('page', 1),
            10
        );
        $htmlNav = $generator->getAdminSectionGenerator();
        return $this->render('admin/dirigeantsAsf.html.twig', [
            'dirigeants' => $dirigeants,
            'html_nav' => $htmlNav,
        ]);
    }

    /**
     * @Route("/salaries", name="salaries", methods={"GET"})
     * @param Request $request
     * @param SalariesRepository $salariesRepository
     * @param PaginatorInterface $paginator
     * @param AdminSectionGenerator $generator
     * @return Response
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function salariesAsf(
        Request $request,
        SalariesRepository $salariesRepository,
        PaginatorInterface $paginator,
        AdminSectionGenerator $generator
    ): Response {
        $salaries = $salariesRepository->findBy([], [
            'lastname' => 'ASC'
        ]);
        $salaries = $paginator->paginate(
            $salaries,
            $request->query->getInt('page', 1),
            10
        );
        $htmlNav = $generator->getAdminSectionGenerator();
        return $this->render('admin/salariesAsf.html.twig', [
            'salaries' => $salaries,
            'html_nav' => $htmlNav,
        ]);
    }

    /**
     * @Route("/adherant", name="adherant", methods={"GET"})
     * @param Request $request
     * @param AdherantImageRepository $imageRepository
     * @param AdherantTextRepository $textRepository
     * @param AdherantPartenaireRepository $adherantPartenaireR
     * @param PaginatorInterface $paginator
     * @param AdminSectionGenerator $generator
     * @return Response
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function carteAdherant(
        Request $request,
        AdherantImageRepository $imageRepository,
        AdherantTextRepository $textRepository,
        AdherantPartenaireRepository $adherantPartenaireR,
        PaginatorInterface $paginator,
        AdminSectionGenerator $generator
    ): Response {
        $adherantImages = $imageRepository->findAll();
        $adherantTexts = $textRepository->findAll();
        $adherantPartenaires = $adherantPartenaireR->findBy([], [
            'name' => 'ASC'
        ]);
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
        $adherantPartenaires = $paginator->paginate(
            $adherantPartenaires,
            $request->query->getInt('page', 1),
            10
        );
        $htmlNav = $generator->getAdminSectionGenerator();
        return $this->render('admin/adherant.html.twig', [
            'adherant_images' => $adherantImages,
            'adherant_texts' => $adherantTexts,
            'adherant_partenaires' => $adherantPartenaires,
            'html_nav' => $htmlNav,
        ]);
    }

    /**
     * @Route("/contact", name="contact_horaire", methods={"GET"})
     * @param Request $request
     * @param ContactHoraireRepository $horaireRepository
     * @param PaginatorInterface $paginator
     * @param AdminSectionGenerator $generator
     * @return Response
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function contact(
        Request $request,
        ContactHoraireRepository $horaireRepository,
        PaginatorInterface $paginator,
        AdminSectionGenerator $generator
    ): Response {
        $horaires = $horaireRepository->findBy([], [
            'id' => 'ASC'
        ]);
        $horaires = $paginator->paginate(
            $horaires,
            $request->query->getInt('page', 1),
            10
        );
        $htmlNav = $generator->getAdminSectionGenerator();
        return $this->render('admin/contactHoraire.html.twig', [
            'contact_horaires' => $horaires,
            'html_nav' => $htmlNav,
        ]);
    }

    /**
     * @Route("/dirigeants/post", name="dirigeants_post", methods={"GET"})
     * @param Request $request
     * @param DirigeantsPostRepository $postRepository
     * @param PaginatorInterface $paginator
     * @param AdminSectionGenerator $generator
     * @return Response
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function addPost(
        Request $request,
        DirigeantsPostRepository $postRepository,
        PaginatorInterface $paginator,
        AdminSectionGenerator $generator
    ): Response {
        /*
                $posts = $postRepository->findAll();
        $postOrdered = [];
        foreach ($posts as $post) {
            $postOrdered[$post->getNumber()][] = $post;
        }
        ksort($postOrdered);
        $posts = $paginator->paginate(
            $postOrdered,
            $request->query->getInt('page', 1),
            10
        );
        */
        $posts = $postRepository->findBy([], [
            'number' => 'ASC'
        ]);
        $posts = $paginator->paginate(
            $posts,
            $request->query->getInt('page', 1),
            10
        );
        $htmlNav = $generator->getAdminSectionGenerator();
        return $this->render('admin/dirigeantsPost.html.twig', [
            'dirigeants_posts' => $posts,
            'html_nav' => $htmlNav,
        ]);
    }

    /**
     * @Route("/section", name="section", methods={"GET"})
     * @param Request $request
     * @param SectionRepository $sectionRepository
     * @param PaginatorInterface $paginator
     * @param AdminSectionGenerator $generator
     * @return Response
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function addSection(
        Request $request,
        SectionRepository $sectionRepository,
        PaginatorInterface $paginator,
        AdminSectionGenerator $generator
    ): Response {
        $sections = $sectionRepository->findBy([], [
            'name' => 'ASC',
        ]);
        $sections = $paginator->paginate(
            $sections,
            $request->query->getInt('page', 1),
            10
        );
        $htmlNav = $generator->getAdminSectionGenerator();
        return $this->render('admin/section.html.twig', [
            'sections' => $sections,
            'html_nav' => $htmlNav,
        ]);
    }

    /**
     * @Route("/president", name="president", methods={"GET"})
     * @param Request $request
     * @param PresidentRepository $presidentRepository
     * @param PaginatorInterface $paginator
     * @param AdminSectionGenerator $generator
     * @return Response
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function addPresident(
        Request $request,
        PresidentRepository $presidentRepository,
        PaginatorInterface $paginator,
        AdminSectionGenerator $generator
    ): Response {
        $presidents = $presidentRepository->findBy([], [
            'date' => 'ASC',
        ]);
        $presidents = $paginator->paginate(
            $presidents,
            $request->query->getInt('page', 1),
            10
        );
        $htmlNav = $generator->getAdminSectionGenerator();
        return $this->render('admin/president.html.twig', [
            'presidents' => $presidents,
            'html_nav' => $htmlNav,
        ]);
    }

    /**
     * @Route("/carousel/history", name="carousel_history", methods={"GET"})
     * @param Request $request
     * @param CarouselHistoryRepository $carouselHistory
     * @param PaginatorInterface $paginator
     * @param AdminSectionGenerator $generator
     * @return Response
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function carouselHistory(
        Request $request,
        CarouselHistoryRepository $carouselHistory,
        PaginatorInterface $paginator,
        AdminSectionGenerator $generator
    ): Response {
        $carouselHistories = $carouselHistory->findAll();
        $carouselHistories = $paginator->paginate(
            $carouselHistories,
            $request->query->getInt('page', 1),
            10
        );
        $htmlNav = $generator->getAdminSectionGenerator();
        return $this->render('admin/carouselHistory.html.twig', [
            'carousel_history' => $carouselHistories,
            'html_nav' => $htmlNav,
        ]);
    }

    /**
     * @Route("/carousel/section", name="carousel_section", methods={"GET"})
     * @param Request $request
     * @param CarouselSectionRepository $carouselSection
     * @param PaginatorInterface $paginator
     * @param AdminSectionGenerator $generator
     * @return Response
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function carouselSection(
        Request $request,
        CarouselSectionRepository $carouselSection,
        PaginatorInterface $paginator,
        AdminSectionGenerator $generator
    ): Response {
        $carouselSections = $carouselSection->findAll();
        $carouselSections = $paginator->paginate(
            $carouselSections,
            $request->query->getInt('page', 1),
            10
        );
        $htmlNav = $generator->getAdminSectionGenerator();
        return $this->render('admin/carouselSection.html.twig', [
            'carousel_section' => $carouselSections,
            'html_nav' => $htmlNav,
        ]);
    }

    /**
     * @Route("/carousel/partenaire", name="carousel_partenaire", methods={"GET"})
     * @param Request $request
     * @param CarouselPartenaireRepository $carouselPartenaire
     * @param PaginatorInterface $paginator
     * @param AdminSectionGenerator $generator
     * @return Response
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function carouselPartenaire(
        Request $request,
        CarouselPartenaireRepository $carouselPartenaire,
        PaginatorInterface $paginator,
        AdminSectionGenerator $generator
    ): Response {
        $carouselPartenaires = $carouselPartenaire->findAll();
        $carouselPartenaires = $paginator->paginate(
            $carouselPartenaires,
            $request->query->getInt('page', 1),
            10
        );
        $htmlNav = $generator->getAdminSectionGenerator();
        return $this->render('admin/carouselPartenaire.html.twig', [
            'carousel_partenaire' => $carouselPartenaires,
            'html_nav' => $htmlNav,
        ]);
    }

    /**
     * @Route("/history", name="history", methods={"GET"})
     * @param Request $request
     * @param HistoryRepository $historyRepository
     * @param PaginatorInterface $paginator
     * @param AdminSectionGenerator $generator
     * @return Response
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function history(
        Request $request,
        HistoryRepository $historyRepository,
        PaginatorInterface $paginator,
        AdminSectionGenerator $generator
    ): Response {
        $history = $historyRepository->findBy([], [
            'date' => 'ASC'
        ]);
        $history = $paginator->paginate(
            $history,
            $request->query->getInt('page', 1),
            10
        );
        $htmlNav = $generator->getAdminSectionGenerator();
        return $this->render('admin/history.html.twig', [
            'historys' => $history,
            'html_nav' => $htmlNav,
        ]);
    }

    /**
     * @Route("/actuality", name="actuality", methods={"GET"})
     * @param Request $request
     * @param ActualityRepository $actualityRepository
     * @param PaginatorInterface $paginator
     * @param AdminSectionGenerator $generator
     * @return Response
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function actuality(
        Request $request,
        ActualityRepository $actualityRepository,
        PaginatorInterface $paginator,
        AdminSectionGenerator $generator
    ): Response {
        $actuality = $actualityRepository->findBy([], [
            'id' => 'DESC'
        ]);
        $actuality = $paginator->paginate(
            $actuality,
            $request->query->getInt('page', 1),
            10
        );
        $htmlNav = $generator->getAdminSectionGenerator();
        return $this->render('admin/actuality.html.twig', [
            'actualitys' => $actuality,
            'html_nav' => $htmlNav,
        ]);
    }

    /**
     * @Route("/partenaire", name="partenaire", methods={"GET"})
     * @param Request $request
     * @param PartenaireRepository $partenaireRepository
     * @param PaginatorInterface $paginator
     * @param AdminSectionGenerator $generator
     * @return Response
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function partenaire(
        Request $request,
        PartenaireRepository $partenaireRepository,
        PaginatorInterface $paginator,
        AdminSectionGenerator $generator
    ): Response {
        $partenaire = $partenaireRepository->findBy([], [
            'name' => 'ASC'
        ]);
        $partenaire = $paginator->paginate(
            $partenaire,
            $request->query->getInt('page', 1),
            10
        );
        $htmlNav = $generator->getAdminSectionGenerator();
        return $this->render('admin/partenaire.html.twig', [
            'partenaires' => $partenaire,
            'html_nav' => $htmlNav,
        ]);
    }

    /**
     * @Route("/homeAsf", name="homeAsf", methods={"GET"})
     * @param Request $request
     * @param HomeAsfRepository $homeAsfRepository
     * @param PaginatorInterface $paginator
     * @param AdminSectionGenerator $generator
     * @return Response
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function homeAsf(
        Request $request,
        HomeAsfRepository $homeAsfRepository,
        PaginatorInterface $paginator,
        AdminSectionGenerator $generator
    ): Response {
        $homeAsf = $homeAsfRepository->findBy([], [
            'id' => 'ASC'
        ]);
        $homeAsf = $paginator->paginate(
            $homeAsf,
            $request->query->getInt('page', 1),
            10
        );
        $htmlNav = $generator->getAdminSectionGenerator();
        return $this->render('admin/homeAsf.html.twig', [
            'home_asfs' => $homeAsf,
            'html_nav' => $htmlNav,
        ]);
    }

    /**
     * @Route("/partenaireCategory", name="partenaire_category", methods={"GET"})
     * @param Request $request
     * @param PartenaireCategoryRepository $partenaireCatRep
     * @param PaginatorInterface $paginator
     * @param AdminSectionGenerator $generator
     * @return Response
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function addPartenaireCategory(
        Request $request,
        PartenaireCategoryRepository $partenaireCatRep,
        PaginatorInterface $paginator,
        AdminSectionGenerator $generator
    ): Response {
        $partenaireCategory = $partenaireCatRep->findBy([], [
            'name' => 'ASC'
        ]);
        $partenaireCategory = $paginator->paginate(
            $partenaireCategory,
            $request->query->getInt('page', 1),
            10
        );
        $htmlNav = $generator->getAdminSectionGenerator();
        return $this->render('admin/PartenaireCategory.html.twig', [
            'partenaire_categories' => $partenaireCategory,
            'html_nav' => $htmlNav,
        ]);
    }

    /**
     * @Route("/date", name="date", methods={"GET"})
     * @param Request $request
     * @param HistoryDateRepository $dateRepository
     * @param PaginatorInterface $paginator
     * @param AdminSectionGenerator $generator
     * @return Response
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function addDate(
        Request $request,
        HistoryDateRepository $dateRepository,
        PaginatorInterface $paginator,
        AdminSectionGenerator $generator
    ): Response {
        $date = $dateRepository->findBy([], [
            'date' => 'ASC'
        ]);
        $date = $paginator->paginate(
            $date,
            $request->query->getInt('page', 1),
            10
        );
        $htmlNav = $generator->getAdminSectionGenerator();
        return $this->render('admin/date.html.twig', [
            'dates' => $date,
            'html_nav' => $htmlNav,
        ]);
    }

    /**
     * @Route("/cgu", name="cgu", methods={"GET"})
     * @param Request $request
     * @param CguRepository $cguRepository
     * @param ItemRepository $itemRepository
     * @param PaginatorInterface $paginator
     * @param AdminSectionGenerator $generator
     * @return Response
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function cgu(
        Request $request,
        CguRepository $cguRepository,
        ItemRepository $itemRepository,
        PaginatorInterface $paginator,
        AdminSectionGenerator $generator
    ): Response {
        $cgu = $cguRepository->findAll();
        $cgu = $paginator->paginate(
            $cgu,
            $request->query->getInt('page', 1),
            10
        );
        $item = $itemRepository->findBy([], [
            'cguCategory' => 'ASC'
        ]);
        $item = $paginator->paginate(
            $item,
            $request->query->getInt('page', 1),
            10
        );
        $htmlNav = $generator->getAdminSectionGenerator();
        return $this->render('admin/cgu.html.twig', [
            'cgus' => $cgu,
            'items' => $item,
            'html_nav' => $htmlNav,
        ]);
    }

    /**
     * @Route("/cgu/category", name="cgu_category", methods={"GET"})
     * @param Request $request
     * @param CguCategoryRepository $cguCategoryRep
     * @param PaginatorInterface $paginator
     * @param AdminSectionGenerator $generator
     * @return Response
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function addCguCategory(
        Request $request,
        CguCategoryRepository $cguCategoryRep,
        PaginatorInterface $paginator,
        AdminSectionGenerator $generator
    ): Response {
        $cguCategory = $cguCategoryRep->findAll();
        $cguCategory = $paginator->paginate(
            $cguCategory,
            $request->query->getInt('page', 1),
            10
        );
        $htmlNav = $generator->getAdminSectionGenerator();
        return $this->render('admin/cguCategory.html.twig', [
            'cgu_categories' => $cguCategory,
            'html_nav' => $htmlNav,
        ]);
    }
}
