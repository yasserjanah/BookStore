<?php

namespace App\Form;

use App\Entity\Livre;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class IncreaseLivreNoteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('note', ChoiceType::class, [
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
            'label' => ' ',
            'attr' => [
                'class' => 'text-2xl font-bold rounded border-2 border-red-700 text-gray-600 pl-5 pr-5 bg-white hover:border-gray-400 focus:outline-none appearance-none',
            ]
        ])
        ->add('submit', SubmitType::class, [
            'label' => 'UP note',
            'attr' => [
                'class' => 'mt-2 text-white bg-red-500 border-0 py-2 px-6 focus:outline-none hover:bg-red-600 rounded',
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
