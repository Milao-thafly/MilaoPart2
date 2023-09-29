<?php

namespace App\Form;

use App\Entity\Product;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class EditFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name',TextType::class, [
                'label' => 'Nom:',
                'required' => true
            ])
            ->add('SKU', NumberType::class, [
                'label' => 'SKU:',
                'required' => true
            ])
            ->add('category_id', NumberType::class, [
                'label' => 'IdCategory:'

            ])
            ->add('inventory_id', NumberType::class , [
                'label' => 'IdInventory:'
            ])
            ->add('price', NumberType::class, [
                'label' => 'Prix:',
                'required' => true
            ])
            ->add('discount_id', NumberType::class, [
                'label' => 'Discount'
            ])

            ->add('imageFile', VichImageType::class, [
                'required' => false,
                'download_uri' => false,
                'image_uri' => true, 
                'asset_helper' => true,
                'label' => 'Image',
            ])

            ->add('Save', SubmitType::class, [
                'label' => 'Sauvegarder:'
            ]);



    }
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
        ]);
    }


}
