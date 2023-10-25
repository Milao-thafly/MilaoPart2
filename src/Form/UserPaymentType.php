<?php

namespace App\Form;

use App\Entity\UserPayment;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserPaymentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('payment_type')
            ->add('card_name')
            ->add('user_id')
            ->add('provider')
            ->add('account_no')
            ->add('expiry')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => UserPayment::class,
        ]);
    }
}