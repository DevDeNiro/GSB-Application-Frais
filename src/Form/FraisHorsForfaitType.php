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
        $builder
            ->add('mois')

            ->add('montant',  NumberType::class, [
                        'required' => true,
                        'attr' => array ( 
                            'placeholder' => 'montant' )
                    ],
                )  

                ->add('libelle', TextType::class, [
                    'required' => true,
                    'attr' => array ( 
                        'placeholder' => 'libelle' )
                ],
            )
                ->add('dates', DateType::class, [
                    'required' => true,
                    'attr' => array ( 
                        'placeholder' => '' )     
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
