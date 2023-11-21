<?php

namespace App\Form;

use App\Entity\Product;
use App\Entity\Discount;
use App\Entity\ProductCategory;
use App\Entity\ProductInventory;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
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
                'required' => true,
                'attr' => [
                    'class' => 'inputForm'
                ]
            ])
            ->add('SKU', NumberType::class, [
                'label' => 'SKU:',
                'required' => true,
                'attr' => [
                    'class' => 'inputForm'
                ]
            ])
            ->add('category_id', EntityType::class, [
                'class' => ProductCategory::class,
                'label' => 'Categories:',
                'choice_label' => 'name',
                'expanded' => true,
                'multiple' => true,
                'attr' => [
                    'class' => 'inputForm'
                ]

            ])
            ->add('inventory_id', EntityType::class , [
                'class' => ProductInventory::class,
                'label' => 'Inventory:',
                'choice_label' => 'name',
                'expanded' => true,
                'multiple' => true,
                'attr' => [
                    'class' => 'inputForm'
                ]
            ])
            ->add('price', NumberType::class, [
                'label' => 'Prix:',
                'required' => true,
                'attr' => [
                    'class' => 'inputForm'
                ]
            ])
            ->add('discount_id', EntityType::class, [
                'class' => Discount::class,
                'label' => 'Discount',
                'choice_label' => 'name',
                'expanded' => true,
                'multiple' => true,
                'attr' => [
                    'class' => 'inputForm'
                ]
            ])

            ->add('imageFile', VichImageType::class, [
                'required' => false,
                'download_uri' => false,
                'image_uri' => true, 
                'asset_helper' => true,
                'label' => 'Image',
                'attr' => [
                    'class' => 'inputForm'
                ]
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
