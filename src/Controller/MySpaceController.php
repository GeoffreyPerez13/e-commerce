<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MySpaceController extends AbstractController
{
    #[Route('/profile/mySpace', name: 'app_my_space')]
    public function index(): Response
    {
        // get user data
        $userName = ucfirst($this->getUser()->getName());
        $userFirstName = ucfirst($this->getUser()->getFirstName());
        $userEmail = $this->getUser()->getEmail();
        $userEmailVerifier = $this->getUser()->isVerified();

        return $this->render('my_space/index.html.twig', [
            'name' => $userName,
            'firstname' => $userFirstName,
            'email' => $userEmail,
            'verified' => $userEmailVerifier

        ]);
    }
}
