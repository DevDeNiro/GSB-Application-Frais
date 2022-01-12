<?php

namespace App\Form;

use App\Entity\RechercheClient;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;


class RechercheClientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('user', TextType::class, [
                'required' => false,
                'label' => false,
                'attr' => array ( 
                    'placeholder' => 'Michel Cantona' 
                )
            ],
            )

            

            ->add('dateUser', NumberType::class, [
                'required' => false,
                'label' => false,
                'attr' => array (
                    'placeholder' => '2021' 
                )
            ],
            )

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => RechercheClient::class,
            'method' => 'get',
            'crfs_protection' => false
        ]);
    }

    public function getBlockPrefix () {         // Petite function pour que l'Url soit + propre
        return '';
    }
}
