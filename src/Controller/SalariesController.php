<?php

namespace App\Controller;

use App\Entity\Salaries;
use App\Form\SalariesType;
use App\Repository\SalariesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

/**
 * Class SalariesController
 * @package App\Controller
 * @Route("/asf/salaries")
 */
class SalariesController extends AbstractController
{
    /**
     * @Route("/", name="asf_salaries", methods={"GET"})
     * @param SalariesRepository $salariesRepository
     * @return Response
     */
    public function index(SalariesRepository $salariesRepository): Response
    {
        return $this->render('asf/salaries/index.html.twig', [
            'salaries' => $salariesRepository->findBy([], [
                'lastname' => 'ASC'
            ]),
        ]);
    }

    /**
     * @Route("/asf/salaries/new", name="asf_salaries_new", methods={"GET","POST"})
     * @param Request $request
     * @param SluggerInterface $slugger
     * @return Response
     */
    public function new(Request $request, SluggerInterface $slugger): Response
    {
        $salary = new Salaries();
        $form = $this->createForm(SalariesType::class, $salary);
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
                        $this->getParameter('upload_dir_salaries'),
                        $newImageFile
                    );
                } catch (FileException $e) {
                }
                $salary->setImage($newImageFile);
            }
            $entityManager->persist($salary);
            $entityManager->flush();

            return $this->redirectToRoute('admin_salaries');
        }

        return $this->render('asf/salaries/new.html.twig', [
            'salary' => $salary,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/asf/salaries/show/{id}", name="asf_salaries_show", methods={"GET"})
     * @param Salaries $salary
     * @return Response
     */
    public function show(Salaries $salary): Response
    {
        return $this->render('asf/salaries/show.html.twig', [
            'salary' => $salary,
        ]);
    }

    /**
     * @Route("/asf/salaries/edit/{id}", name="asf_salaries_edit", methods={"GET","POST"})
     * @param Request $request
     * @param Salaries $salary
     * @return Response
     */
    public function edit(Request $request, Salaries $salary): Response
    {
        $form = $this->createForm(SalariesType::class, $salary);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_salaries');
        }

        return $this->render('asf/salaries/edit.html.twig', [
            'salary' => $salary,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/asf/salaries/delete/{id}", name="asf_salaries_delete", methods={"DELETE"})
     * @param Request $request
     * @param Salaries $salary
     * @param EntityManagerInterface $entityManager
     * @return Response
     */
    public function delete(Request $request, Salaries $salary, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $salary->getId(), $request->request->get('_token'))) {
            $filename = $salary->getImage();
            if ($filename !== '' && is_string($this->getParameter('upload_dir_salaries'))) {
                $path = $this->getParameter('upload_dir_salaries') . $filename;
                unlink($path);
            }
            $entityManager->remove($salary);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_salaries');
    }
}
