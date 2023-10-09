<?php

namespace App\Form;

use App\Entity\Useradress;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AdressFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('user_id')
            ->add('adress_line1')
            ->add('adress_line2')
            ->add('city')
            ->add('postal_code')
            ->add('country')
            ->add('telephone')
            ->add('mobile')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Useradress::class,
        ]);
    }
}
