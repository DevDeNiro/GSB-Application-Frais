<?php

namespace App\Form;

use App\Entity\Vehicules;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class VehiculesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('marque', ChoiceType::class, [
                'choices'  => [

                    'Sélectionner un véhicule' => '',
 
                    'Marque de voitures' => [
                        'Tesla' => 'Tesla',
                        'Renauld' => 'Renauld',
                        'Peugeot' => 'Peugeot',
                        'Toyota' => 'Toyota',
                        'mitsubishi' => 'mitsubishi',
                        'honda' => 'honda',
                        'bmw' => 'bmw',
                        'mercedes' => 'mercedes',
                        'Volkswagen' => 'Volkswagen',
                        'audi' => 'audi',
                        // 'autre' => 'autre', Autre à pouvoir renseigner librement          
                ],
            ]
        ])
            
            ->add('modele', TextType::class ,[
               
                'required' => true,
                'attr' => array ( 
                    'placeholder' => 'Modèle du véhicule' )
            ])

            ->add('immatriculation', TextType::class ,[
                
                'required' => true,
                'attr' => array ( 
                    'placeholder' => 'AA-123-AA' )
            ])

            ->add('carburant', ChoiceType::class, [
                'choices'  => [

                    'Sélectionner un carburant' => '',
                   
                    'Type de carburant' => [
                        'Diesel' => 'Diesel',
                        'Essence' => 'Essence',
                        'GNV' => 'GNV',
                        'GPL' => 'GPL',
                        // 'autre' => 'autre', Autre à pouvoir renseigner librement          
                ],
            ]
        ])

            ->add('chevaux_fiscaux', NumberType::class ,[
               
                'required' => true,
                'attr' => array ( 
                    'placeholder' => 'Chevaux fiscaux' )
            ])

            ->add('annee', NumberType::class ,[
               
                'required' => true, 
                'attr' => array ( 
                    'placeholder' => 'Année du véhicule' )           
            ])

            
            ->getForm()
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Vehicules::class,
        ]);
    }
}
