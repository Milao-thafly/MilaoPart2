<?php

namespace App\Form;

use App\Entity\User;
use Doctrine\DBAL\Types\ArrayType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('username',TextType::class, [
                'label' => 'Username:',
                'required' => true,
            ])
            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'first_options' => ['label' => 'Password', 'hash_property_path' => 'password'],
                'second_options' => ['label' => 'Repeat Password'],
                'mapped' => false,
            ])
            ->add('first_name', TextType::class, [
                'label' => 'FirstName',
                'required' => true,
            ])
            ->add('last_name', TextType::class, [
                'label' => 'lastName',
                'required' => true,
            ])
            ->add('age', IntegerType::class, [
                'label' => 'age',
                'required' => true,
            ])
            ->add('email', TextType::class, [
                'label' => 'email',
                'required' => true,
            ])
            // ->add('imageFile', VichImageType::class, [
            //     'required' => false,
            //     'download_uri' => false,
            //     'image_uri' => true, 
            //     'asset_helper' => true,
            //     'label' => 'Image',
            // ])
            ->add('telephone', IntegerType::class, [
                'label' => 'Telephone',
                'required' => true,
            ])


            ->add('save', SubmitType::class, ['label' => 'Submit'

            ]);

        
    

        // if($this->security->isGranted('ROLE_ADMIN')) {
        //     $form->add('roles', ChoiceType::class, [
        //         'choices' => [
        //             'Utilisateur' => 'ROLE_USER',
        //             'Editeur' => 'ROLE_EDITOR',
        //             'Administrateur' => 'ROLE_ADMIN',
        //         ],
        //         'label' => 'Roles:',
        //         'required' => false,
        //         'expanded' => true,
        //         'multiple' => true,
        //     ]);
        // }
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
