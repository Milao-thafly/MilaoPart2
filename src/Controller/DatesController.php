<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DatesController extends AbstractController
{
    #[Route('/dates', name: 'app_dates')]
    public function index(): Response
    {
        return $this->render('dates/dates.html.twig', [
            'controller_name' => 'DatesController',
        ]);
    }
}
