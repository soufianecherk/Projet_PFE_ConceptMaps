<?php

namespace App\Form;

use App\Entity\SharedMap;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ShareMapType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('sender', HiddenType::class)
            ->add('recieverEmail', EmailType::class, [
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('ReadOnly', CheckboxType::class, [
                'required' => false,
                'label' => 'Read only',
                'attr' => []
            ])
            ->add('mapLabel', HiddenType::class)
            ->add('Map', HiddenType::class, ['mapped' => 'false']);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => SharedMap::class,
        ]);
    }
}
