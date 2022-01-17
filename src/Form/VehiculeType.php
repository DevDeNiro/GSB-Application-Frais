<?php

namespace App\Form;

use App\Entity\Vehicule;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Validator\Constraints\Length;

class VehiculeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('marque', ChoiceType::class, [
                'choices'  => [

                    'Type de véhicule' => '',
 
                    'Marque de voitures' => [
                        'Renauld' => 'Renauld',
                        'Peugeot' => 'Peugeot',
                        'Toyota' => 'Toyota',
                        'Mitsubishi' => 'mitsubishi',
                        'Honda' => 'honda',
                        'BMW' => 'bmw',
                        'Mercedes' => 'mercedes',
                        'Volkswagen' => 'Volkswagen',
                        'Audi' => 'audi',
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
                'constraints' => [new Length(['max' => 9])],
                'attr' => array ( 
                    'placeholder' => 'AA-123-AA' )
            ])

            ->add('carburant', ChoiceType::class, [
                'choices'  => [

                    'Type de carburant' => '',
                   
                    'Type de carburant' => [
                        'Diesel' => 'Diesel',
                        'Essence' => 'Essence'
                        // 'autre' => 'autre', Autre à pouvoir renseigner librement          
                ],
            ]
        ])

            ->add('chevaux', NumberType::class ,[
               
                'required' => true,
                'attr' => array ( 
                    'placeholder' => 'Chevaux fiscaux' )
            ])

            ->add('proprietaire', TextType::class ,[

                'required' => true,
                'constraints' => [new Length(['max' => 9])],
                'attr' => array ( 
                    'placeholder' => 'AA-123-AA' )
            ])
  
            ->getForm()
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Vehicule::class,
        ]);
    }
}
