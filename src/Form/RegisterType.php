<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        
            $builder
            ->add('firstname', TextType::class, [
                'label' => 'Votre prenom',
                'constraints' => new Length([
                    'min' => 2,
                    'max' => 30,
                ]),
                'attr'  => [
                    'placeholder' => 'Saisir votre prénom'
                ]
            ])

            ->add('lastname', TextType::class, [
                'label' => 'Votre nom',
                'constraints' => new Length([
                    'min' => 2,
                    'max' => 30,
                ]),
                'attr'  => [
                    'placeholder' => 'Saisir votre nom'
                ]
            ])

            ->add('email', EmailType::class, [
                'label' => 'Votre email pro',
                'constraints' => new Length([
                    'min' => 2,
                    'max' => 30,
                ]),
                'attr'  => [
                    'placeholder' => 'merci de saisir votre email professionnel'
                ]
            ])
            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'invalid_message' => 'les mots de passe doivent être identiques',
                'required' => true,
                'first_options'  => [
                    'label' => 'Mot de passe',
                    'attr'  => [
                        'placeholder' => 'Merci de saisir le mot de passe'
                    ]
                ],
                'second_options' => [
                    'label' => 'Confirmez votre mot de passe',
                    'attr'  => [
                        'placeholder' => 'merci de confirmer le mot de passe'
                    ]

                ]
            ])
            ->add('submit', SubmitType::class, [
                'label' => "s'inscrire"
            ]);   




    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
