<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PaymentController extends AbstractController
{
    
    #[Route('/payment', name: 'app_payment')]
    public function index(): Response
    {
        $payment = new PaymentDetails();

        $paymentForm = $this->createForm(PaymentFormType::class, $payment);
        $paymentForm->handleRequest($request);

        if ($paymentForm->isSubmitted() && $paymentForm->isValid()) {
            $UserId = $this -> getUser() -> getId();
            $payment-> setUserId($UserId);

            $em->persist($payment);
            $em->flush();

            $this->addFlash('success', 'Article créé avec succès');
            
        }
        return $this->render('payment/index.html.twig', [
            'form' => $paymentForm->createView()
        ]);
    }
}
