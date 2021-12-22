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
            ->add('marque', TextType::class ,[
                'label' => 'Marque',
                'required' => true,
                'attr' => array ( 
                    'placeholder' => 'Marque' )
            ],

            ChoiceType::class, [

                'choices'  => [
                    'Maybe' => 'Maybe',
                    'Yes' => 'Yes',
                    'No' => 'Qsd',
                ],
            ])
            
            ->add('modele', TextType::class ,[
                'label' => 'Modèle',
                'required' => true,
                'attr' => array ( 
                    'placeholder' => 'Modèle du véhicule' )
            ])

            ->add('immatriculation', TextType::class ,[
                'label' => 'Immatriculation',
                'required' => true,
                'attr' => array ( 
                    'placeholder' => 'AA-123-AA' )
            ])

            ->add('carburant', TextType::class ,[
                'label' => 'Carburant',
                'required' => true,
                'attr' => array ( 
                    'placeholder' => 'Type de carburant' )
            ])

            ->add('chevaux_fiscaux', NumberType::class ,[
                'label' => ' Chevaux fiscaux',
                'required' => true,
                'attr' => array ( 
                    'placeholder' => 'Chevaux fiscaux' )
            ])

            ->add('annee', NumberType::class ,[
                'label' => 'Année',
                'required' => true, 
                'attr' => array ( 
                    'placeholder' => 'Année du véhicule' )           
            ])

            // ->add('submit', SubmitType::class, [ 
                
            //     'label' => 'Envoyer',
            //     // 'row_attr' => [ 'class' => 'btn btn-outline-success mt-3 ', 
            // ])
             
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
