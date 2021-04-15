<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Entity\ContactHoraire;
use App\Form\ContactHoraireType;
use App\Form\ContactType;
use App\Repository\ContactHoraireRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class ContactController
 * @package App\Controller
 * @Route("/asf/contact")
 */
class ContactController extends AbstractController
{
    /**
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @param MailerInterface $mailer
     * @param ContactHoraireRepository $horaireRepository
     * @return Response
     * @throws TransportExceptionInterface
     * @Route("/", name="asf_contact", methods={"GET"})
     */
    public function index(
        Request $request,
        EntityManagerInterface $entityManager,
        MailerInterface $mailer,
        ContactHoraireRepository $horaireRepository
    ): Response {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($contact);
            $entityManager->flush();

            $email = (new Email())
                ->to('omnisportasf@gmail.com')
                ->html($this->renderView('asf/contact/contactMail.html.twig', ['contact' => $contact]));
            $mailer->send($email);
            return $this->redirectToRoute('index');
        }
        return $this->render('asf/contact/index.html.twig', [
            'form' => $form->createView(),
            'contact_horaires' => $horaireRepository->findBy([], [
                'id' => 'ASC'
            ]),
        ]);
    }

    /**
     * @Route("/new", name="asf_contact_horaire_new", methods={"GET","POST"})
     * @param Request $request
     * @return Response
     */
    public function new(Request $request): Response
    {
        $contactHoraire = new ContactHoraire();
        $form = $this->createForm(ContactHoraireType::class, $contactHoraire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($contactHoraire);
            $entityManager->flush();

            return $this->redirectToRoute('admin_contact_horaire');
        }

        return $this->render('asf/contact/contact_horaire/new.html.twig', [
            'contact_horaire' => $contactHoraire,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/show/{id}", name="asf_contact_horaire_show", methods={"GET"})
     * @param ContactHoraire $contactHoraire
     * @return Response
     */
    public function show(ContactHoraire $contactHoraire): Response
    {
        return $this->render('asf/contact/contact_horaire/show.html.twig', [
            'contact_horaire' => $contactHoraire,
        ]);
    }

    /**
     * @Route("/edit/{id}", name="asf_contact_horaire_edit", methods={"GET","POST"})
     * @param Request $request
     * @param ContactHoraire $contactHoraire
     * @return Response
     */
    public function edit(Request $request, ContactHoraire $contactHoraire): Response
    {
        $form = $this->createForm(ContactHoraireType::class, $contactHoraire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_contact_horaire');
        }

        return $this->render('asf/contact/contact_horaire/edit.html.twig', [
            'contact_horaire' => $contactHoraire,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/delete/{id}", name="asf_contact_horaire_delete", methods={"DELETE"})
     * @param Request $request
     * @param ContactHoraire $contactHoraire
     * @return Response
     */
    public function delete(Request $request, ContactHoraire $contactHoraire): Response
    {
        if ($this->isCsrfTokenValid('delete' . $contactHoraire->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($contactHoraire);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_contact_horaire');
    }
}
