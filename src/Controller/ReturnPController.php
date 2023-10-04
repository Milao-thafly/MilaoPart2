<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ReturnPController extends AbstractController
{
    #[Route('/return', name: 'app_return')]
    public function index(): Response
    {
        return $this->render('return/ReturnP.html.twig', [
            'controller_name' => 'ReturnPController',
        ]);
    }
}
