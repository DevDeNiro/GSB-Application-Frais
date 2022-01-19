<?php

namespace App\Form;

use App\Entity\FraisHorsForfait;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;


class FraisHorsForfaitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        setlocale(LC_TIME, "fr_FR");
        $mois_actuel = date("F");

        $builder
            // ->add('mois')

            ->add('montant',  NumberType::class, [
                        'required' => true,
                        'attr' => array ( 
                            'placeholder' => 'montant' )
                    ],
                )  

                ->add('libelle', TextType::class, [
                    'required' => true,
                    'attr' => array ( 
                        'placeholder' => 'libelle' ),
                    'label' => 'Libellé (ex: Exemple)'
                    
                ],
            )

            ->add('mois', TextType::class, [
                'required' => false,
                'attr' => array ( 
                    'placeholder' => 'Mois',
                'data' =>  $mois_actuel ),
                'label' => 'Mois',
                'empty_data' => $mois_actuel
                    
            ],   
        )
            ->add('proprietaire', TextType::class ,[

                'required' => true,
                'constraints' => [new Length(['max' => 9])],
                'attr' => array ( 
                    'placeholder' => 'AA-123-AA' )
            ])

            ->add('etat', TextType::class, [
                'required' => false,
                'empty_data' => 'En attente'      
            ],   
        )
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => FraisHorsForfait::class,
        ]);
    }
}
