<?php

namespace App\Form;

use App\Entity\Carburant;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class CarburantFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('nom', TextType::class, [
            'required' => true,
            'attr' => array ( 
                'placeholder' => 'Carburant' )                
        ])

        ->add('prix', NumberType::class,[
            'required' => true,
            'attr' => array ( 
                'placeholder' => 'Prix' )
    ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Carburant::class,
        ]);
    }
}
