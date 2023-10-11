<?php

namespace App\Form;

use App\Entity\PaymentDetails;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PaymentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('order_id')
            ->add('amount')
            ->add('provider')
            ->add('status')
            ->add('created_at')
            ->add('modified_at')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => PaymentDetails::class,
        ]);
    }
}
