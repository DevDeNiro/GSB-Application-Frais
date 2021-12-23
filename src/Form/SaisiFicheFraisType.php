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

use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use App\Entity\FraisForfait;
use App\Entity\FraisHorsForfait;

class SaisiFicheFraisType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('repasMidi', EntityType::class,[
                'class' => FraisForfait::class,
            ],
                NumberType::class,[
                    'required' => true,
                    'attr' => array ( 
                        'placeholder' => 'Nombre de repas' )
                ],
            )    
            
            ->add('nuit', EntityType::class,[
                'class' => FraisForfait::class,
            ],
                NumberType::class,[
                    'required' => true,
                    'attr' => array ( 
                        'placeholder' => 'Nombre de nuit' )
                ],
            )  

            ->add('etape', EntityType::class,[
                'class' => FraisForfait::class,
            ],
                NumberType::class,[
                    'required' => true,
                    'attr' => array ( 
                        'placeholder' => 'Nombre détape' )
                ],
            )  

            ->add('km', EntityType::class,[
                'class' => FraisForfait::class,
            ],
                NumberType::class,[
                    'required' => true,
                    'attr' => array ( 
                        'placeholder' => 'Nombre de repas' )
                ],
            )  


            //*** Frais Hors Forfait ****/

            // ->add('dates', EntityType::class,[
            //     'class' => FraisHorsForfait::class,
            // ],
            //     NumberType::class,[
            //         'required' => true,
            //         'attr' => array ( 
            //             'placeholder' => 'Date' )
            //     ],
            // )  

            // ->add('libelle', EntityType::class,[
            //     'class' => FraisHorsForfait::class,
            // ],
            //     NumberType::class,[
            //         'required' => true,
            //         'attr' => array ( 
            //             'placeholder' => 'Libellé' )
            //     ],
            // )  

            // ->add('montant', EntityType::class,[
            //     'class' => FraisHorsForfait::class,
            // ],
            //     NumberType::class,[
            //         'required' => true,
            //         'attr' => array ( 
            //             'placeholder' => 'Montant' )
            //     ],
            // )  
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => FraisForfait::class,
            // 'data_class' => FraisHorsForfait::class,
            // 'data_class' => null,
        ]);
    }
}
