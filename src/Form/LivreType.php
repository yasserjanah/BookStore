<?php

namespace App\Form;

use App\Entity\Livre;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


class LivreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('isbn' , TextType::class,[
            'attr'=>[
                'class'=> 'mt-4 appearance-none block w-full py-3 px-4 leading-tight text-gray-700 bg-gray-200 focus:bg-white border border-gray-200 focus:border-gray-500 rounded focus:outline-nonet',
                'placeholder' => 'Entrez l\' ISBN'
            ]
        ])
        ->add('titre' , TextType::class,[
            'attr'=>[
                'class'=> 'mt-4 appearance-none block w-full py-3 px-4 leading-tight text-gray-700 bg-gray-200 focus:bg-white border border-gray-200 focus:border-gray-500 rounded focus:outline-nonet',
                'placeholder' => 'Entrez le titre du bouquint'
            ]
        ])
        ->add('nombre_pages' , null,[
            'attr'=>[
                'class'=> 'mt-4 appearance-none block w-full py-3 px-4 leading-tight text-gray-700 bg-gray-200 focus:bg-white border border-gray-200 focus:border-gray-500 rounded focus:outline-nonet',
                'placeholder' => 'Entrez le nombre de page'
            ]
        ])
        ->add('date_de_parution',DateType::class,[
            'widget' => 'single_text',
            'attr'=>[
                'class'=> 'mt-4 appearance-none block w-full py-3 px-4 leading-tight text-gray-700 bg-gray-200 focus:bg-white border border-gray-200 focus:border-gray-500 rounded focus:outline-nonet',
            ]
        ])
        ->add('note',ChoiceType::class,[
            'choices' => [
                '1/20' => 1,
                '2/20' => 2,
                '3/20' => 3,
                '4/20' => 4,
                '5/20' => 5,
                '6/20' => 6,
                '7/20' => 7,
                '8/20' => 8,
                '9/20' => 9,
                '10/20' => 10,
                '11/20' => 11,
                '12/20' => 12,
                '13/20' => 13,
                '14/20' => 14,
                '15/20' => 15,
                '16/20' => 16,
                '17/20' => 17,
                '18/20' => 18,
                '19/20' => 19,
                '20/20' => 20,
            ],
        ])
        ->add('auteurs', null,[
            'attr' => [
                'multiple' => true
            ]
        ])
        ->add('genres', null,[
            'attr' => [
                'multiple' => true
            ]
        ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Livre::class,
        ]);
    }
}
