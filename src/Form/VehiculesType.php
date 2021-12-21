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
            ],

            ChoiceType::class, [

                'choices'  => [
                    'Maybe' => 'Maybe',
                    'Yes' => 'Yes',
                    'No' => 'Yes',
                ],
            ])
            
            ->add('modele', TextType::class ,[
                'label' => 'Modèle',
                'required' => true,
            ])

            ->add('immatriculation', TextType::class ,[
                'label' => 'Immatriculation',
                'required' => true,
            ])

            ->add('carburant', TextType::class ,[
                'label' => 'Carburant',
                'required' => true,
            ])

            ->add('chevaux_fiscaux', NumberType::class ,[
                'label' => ' Chevaux fiscaux',
                'required' => true,
            ])

            ->add('annee', NumberType::class ,[
                'label' => 'Année',
                'required' => true,            
            ])

            ->add('submit', SubmitType::class, [ 
                
                'label' => 'Envoyer',
                'row_attr' => [ 'class' => 'btn btn-outline-success mt-3',
                
            ]])
             
           
            // ->getForm()
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Vehicules::class,
        ]);
    }
}
