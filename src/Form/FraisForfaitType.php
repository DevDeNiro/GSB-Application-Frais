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
                        'placeholder' => 'Nombre d"\étape' )
                ],
            )  

            ->add('km', NumberType::class,[
                    'required' => true,
                    'attr' => array ( 
                        'placeholder' => 'Nombre de repas' )
                ],
            )  
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => FraisForfait::class,
        ]);
    }
}
