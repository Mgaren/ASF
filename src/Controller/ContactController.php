<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
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
 */
class ContactController extends AbstractController
{
    /**
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @param MailerInterface $mailer
     * @return Response
     * @Route("/asf/contact", name="asf_contact")
     * @throws TransportExceptionInterface
     */
    public function index(
        Request $request,
        EntityManagerInterface $entityManager,
        MailerInterface $mailer
    ): Response {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($contact);
            $entityManager->flush();

            $email = (new Email())
                ->to('omnisportasf@gmail.com')
                ->html($this->renderView('contact/contactMail.html.twig', ['contact' => $contact]));
            $mailer->send($email);
            return $this->redirectToRoute('index');
        }
        return $this->render('contact/index.html.twig', [
            "form" => $form->createView()
        ]);
    }
}
