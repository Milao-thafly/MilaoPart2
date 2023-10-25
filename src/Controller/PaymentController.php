<?php

namespace App\Controller;
use App\Entity\User;
use App\Entity\UserPayment;
use App\Form\UserPaymentType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PaymentController extends AbstractController
{
    
    #[Route('/payment', name: 'app_payment')]
    public function index(Request $request, EntityManagerInterface $em): Response
    {
        $payment = new UserPayment();

        $paymentForm = $this->createForm(UserPaymentType::class, $payment);
        $paymentForm->handleRequest($request);

        if ($paymentForm->isSubmitted() && $paymentForm->isValid()) {
            $userId = $this -> getUser() -> getId();
            $payment-> setUserId($userId);

            $em->persist($payment);
            $em->flush();

            $this->addFlash('success', 'Article créé avec succès');
            
        }
        return $this->render('payment/payment.html.twig', [
            'paymentForm' => $paymentForm->createView()
        ]);
    }
}