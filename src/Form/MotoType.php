<?php

namespace App\Form;

use App\Entity\Moto;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class MotoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class, [
                'label' => 'Nom',
                'attr' => ['maxlength' => 255],
                'required' => true,
            ])
            ->add('marque', TextType::class, [
                'label' => 'Marque',
                'attr' => ['maxlength' => 255],
                'required' => true,
            ])
            ->add('couleur', TextType::class, [
                'label' => 'Couleur',
                'attr' => ['maxlength' => 255],
                'required' => true,
            ])
            ->add('année', IntegerType::class, [
                'label' => 'Année',
                'required' => true,
            ])
            ->add('prix', NumberType::class, [
                'label' => 'Prix',
                'required' => true,
            ])
            ->add('save', SubmitType::class, [
                'label' => 'Enregistrer',
                'attr' => ['class' => 'btn btn-primary'],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Moto::class,
        ]);
    }
}
