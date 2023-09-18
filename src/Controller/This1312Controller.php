<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class This1312Controller extends AbstractController
{
    #[Route('/this1312', name: 'app_this1312')]
    public function index(): Response
    {
        return $this->render('this1312/acab.html.twig', [
            'controller_name' => 'This1312Controller',
        ]);
    }
}
