<?php

namespace App\Form;

use App\Entity\Auteur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class AuteurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('nom_prenom', TextType::class,[
            'label'=> false,
            'attr'=>[
                'class' => 'appearance-none block w-full py-3 px-4 leading-tight text-gray-700 bg-gray-200 focus:bg-white border border-gray-200 focus:border-gray-500 rounded focus:outline-none',
                'placeholder' => 'Entrez le nom et le prénom de l\'auteur '
            ]
        ])
        ->add('sexe', ChoiceType::class, [
            'label'=> false,
            'choices'  => [
                'Male' => 'M',
                'Female' => 'F',
            ], 
            'attr'=>[
                'class' => 'mt-4 appearance-none block w-full py-3 px-4 leading-tight text-gray-700 bg-gray-200 focus:bg-white border border-gray-200 focus:border-gray-500 rounded focus:outline-none',
            ]
        ])
        ->add('date_de_naissance',BirthdayType::class,[
            'label'=> false,
            'attr'=>[
                'class' => 'mt-4 appearance-none block w-full py-3 px-4 leading-tight text-gray-700 bg-gray-200 focus:bg-white border border-gray-200 focus:border-gray-500 rounded focus:outline-nonet',
            ],
            'widget' => 'single_text',
        ])
        ->add('nationalite', CountryType::class,[
            'label'=> false,
            'attr'=>[
                'class' => 'mt-4 appearance-none block w-full py-3 px-4 leading-tight text-gray-700 bg-gray-200 focus:bg-white border border-gray-200 focus:border-gray-500 rounded focus:outline-none',
            ]
        ] )
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
            'data_class' => Auteur::class,
        ]);
    }
}
