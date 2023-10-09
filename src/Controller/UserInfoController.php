<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserInfoController extends AbstractController
{
    #[Route('/user/info', name: 'app_user_info')]
    public function index(): Response
    {

        $userInfo = new PaymentDetails();

        $infoForm = $this->createForm(InfoFormType::class, $userInfo);
        $infoForm->handleRequest($request);

        if ($infoForm->isSubmitted() && $infoForm->isValid()) {
            $UserId = $this -> getUser() -> getId();
            $userInfo-> setUserId($UserId);

            $em->persist($userInfo);
            $em->flush();

            $this->addFlash('success', 'Article créé avec succès');
            
        }
        return $this->render('payment/index.html.twig', [
            'form' => $infoForm->createView()
        ]);
        return $this->render('user_info/index.html.twig', [
            'controller_name' => 'UserInfoController',
        ]);
    }
}
