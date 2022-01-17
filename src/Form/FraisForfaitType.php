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

// use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\FraisForfait;

class FraisForfaitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $calcul = 10 + 10;
        strval($calcul);

        $builder
            ->add('repasMidi', NumberType::class,[
                    'required' => true,
                    'attr' => array ( 
                        'placeholder' => 'Nombre de repas' )
                ],
            )    
            
            ->add('nuit', NumberType::class,[
                    'required' => true,
                    'attr' => array ( 
                        'placeholder' => 'Nombre de nuit' )
                ],
            )  

            ->add('etape', NumberType::class,[
                    'required' => true,
                    'attr' => array ( 
                        'placeholder' => 'Nombre d\'étape' )
                ],
            )  

            ->add('km', NumberType::class,[
                    'required' => true,
                    'attr' => array ( 
                        'placeholder' => 'Nombre de repas' )
                ],
            )  

            ->add('libelle', TextType::class,[
                'required' => true,
                'attr' => array ( 
                    'placeholder' => 'Nombre de repas' )
            ],
        )

            ->add('montant', TextType::class,[
                'required' => false,
                'attr' => array ( 
                    'placeholder' => 'Nombre de repas' ,
                    'data' =>  $calcul),
                    'label' => 'calcul',
                    'empty_data' => $calcul
            ],
        )

            ->add('proprietaire', TextType::class ,[

                'required' => true,
                'constraints' => [new Length(['max' => 9])],
                'attr' => array ( 
                    'placeholder' => 'AA-123-AA' )
            ])
            ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => FraisForfait::class,
        ]);
    }
}
