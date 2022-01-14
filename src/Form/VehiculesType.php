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
use Symfony\Component\Validator\Constraints\Length;

class VehiculesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {


        $builder
        ->add('marque', ChoiceType::class, [
                'choices'  => [

                    'Type de véhicule' => '',
 
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
                'constraints' => [new Length(['max' => 9])],
                'attr' => array ( 
                    'placeholder' => 'AA-123-AA' )
            ])

            ->add('carburant', ChoiceType::class, [
                'choices'  => [

                    'Type de carburant' => '',
                   
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

            ->add('usernane', TextType::class ,[
                
                'required' => false,
                'attr' => array ( 
                    'placeholder' => 'username'),
                'label' => 'username',
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
