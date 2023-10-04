<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PrivacyPolicyController extends AbstractController
{
    #[Route('/privacyPolicy', name: 'app_privacyPolicy')]
    public function index(): Response
    {
        return $this->render('privacyPolicy/privacyPolicy.html.twig', [
            'controller_name' => 'PrivacyPolicyController',
        ]);
    }
}
