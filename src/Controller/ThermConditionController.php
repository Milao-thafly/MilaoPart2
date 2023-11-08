<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ThermConditionController extends AbstractController
{
    #[Route('/thermCondition', name: 'app_thermCondition')]
    public function index(): Response
    {
        return $this->render('thermCondition/thermCondition.html.twig', [
            'controller_name' => 'ThermConditionController',
        ]);
    }
}
