<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HelpPageController extends AbstractController
{
    #[Route('/help', name: 'app_help')]
    public function index(): Response
    {
        return $this->render('help/help.html.twig', [
            'controller_name' => 'HelpPageController',
        ]);
    }
}
