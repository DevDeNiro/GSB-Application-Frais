<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Validator\Constraints\Length;
use App\Entity\FraisForfait;

class FraisForfaitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        setlocale(LC_TIME, "fr_FR");
        $mois_actuel = date("m Y");

        $builder
        ->add('repasMidi', NumberType::class,[
                'required' => true,
                'attr' => array ( 
                    'placeholder' => 'Nombre de repas' )
        ])    
        
        ->add('nuit', NumberType::class,[
                'required' => true,
                'attr' => array ( 
                    'placeholder' => 'Nombre de nuit' )
        ])  

        ->add('etape', NumberType::class,[
                'required' => true,
                'attr' => array ( 
                    'placeholder' => 'Nombre d\'étape' )
        ])  

        ->add('km', NumberType::class,[
                'required' => true,
                'attr' => array ( 
                    'placeholder' => 'Nombre de km' )
        ])  

        ->add('libelle', TextType::class,[
            'required' => true,
            'attr' => array ( 
                'placeholder' => 'Libellé' )
        ])

        ->add('montant', NumberType::class,[
            'required' => false,
            'attr' => array ( 
                'placeholder' => 'Montant'),
                'label' => 'calcul',
                'empty_data' => ''
        ])

        ->add('proprietaire', TextType::class ,[

            'required' => true,
            'constraints' => [new Length(['max' => 9])],
            'attr' => array ( 
                'placeholder' => 'AA-123-AA' )
        ])

        ->add('mois', TextType::class, [
            'required' => false,
            'attr' => array ( 
                'placeholder' => 'Mois',
            'data' =>  $mois_actuel ),
            'label' => 'Mois',
            'empty_data' => $mois_actuel
                
        ])

        ->add('etat', TextType::class, [
            'required' => false,
            'empty_data' => 'En attente'      
        ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => FraisForfait::class,
        ]);
    }
}
