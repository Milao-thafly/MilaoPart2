<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProfileController extends AbstractController
{
    #[Route('/profile/{id}', name: 'app_profile')]
    public function index( UserRepository $userRepository): Response
    {
        $users = $userRepository;
        return $this->render('profile/profile.html.twig', [
            'users' => $users,
        ]);
    }
}
