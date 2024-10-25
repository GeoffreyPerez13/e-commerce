<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Mailer\MailerInterface;

class ContactController extends AbstractController
{
    #[Route('/profile/contact', name: 'app_contact')]
    public function index(MailerInterface $mailer, Request $request): Response
    {
        // get user data
        $userName = ucfirst($this->getUser()->getName());
        $userFirstName = ucfirst($this->getUser()->getFirstName());
        $userEmail = $this->getUser()->getEmail();

        // get admon email
        $adminEmail = $_ENV["ADMIN_EMAIL"];
        
        $contactForm = $this->createForm(ContactType::class);

        $contactForm->handleRequest($request);

        if($contactForm->isSubmitted() && $contactForm->isValid()) {
            $this->addFlash("send", "Votre message a bien été envoyé");

            $data = $contactForm->getData();
            $message = $data["message"];
            $mailer->send((new TemplatedEmail())
                ->from($adminEmail)
                ->to($adminEmail)
                ->replyTo($userEmail)
                ->subject("Message provenant d'un utilisateur du site Panthera.")
                ->htmlTemplate("contact/email.html.twig")
                ->context([
                    "message" => $message,
                    "name" => $userName,
                    "firstname" => $userFirstName,
                    "userEmail" => $userEmail
                ]));
        }

            return $this->render('contact/index.html.twig', [
                'contactForm' => $contactForm->createView()
            ]);
    }
}
