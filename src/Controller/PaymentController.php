<?php

namespace App\Controller;

use App\Form\PaymentFormType;
use App\Entity\PaymentDetails;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PaymentController extends AbstractController
{
    
    #[Route('/payment', name: 'app_payment')]
    public function index(Request $request): Response
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
        return $this->render('payment/payment.html.twig', [
            'form' => $paymentForm->createView()
        ]);
    }
}
