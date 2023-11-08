<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdressController extends AbstractController
{
    #[Route('/adress', name: 'app_adress')]
    public function index(): Response{

    $adress = new UserAdress();

    $adressForm = $this->createForm(AdressFormType::class, $adress);
    $adresstForm->handleRequest($request);

    if ($aderssForm->isSubmitted() && $adressForm->isValid()) {
        $UserId = $this -> getUser() -> getId();
        $adress-> setUserId($UserId);

        $em->persist($adress);
        $em->flush();

        $this->addFlash('success', 'Adresse enregistrée');
        
    }
    {
        return $this->render('adress/index.html.twig', [
            'form' => $adressFrom->createView()
        ]);
    }
}
}
