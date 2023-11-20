<?php

namespace App\Form;

use App\Entity\Map;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;



use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class FormMapType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, ['label' => 'Title ', 'attr' => array('class' => 'form-group col')])
            ->add('json', HiddenType::class, ['attr' => array('class' => 'form_map_json hidden')])
            ->add('last_modified', DateTimeType::class, ['mapped' => 'false', 'label' => ' ', 'attr' => array('class' => 'd-none')])
            // ->add('owner', TypeEntityType::class, [
            //     // looks for choices from this entity
            //     'class' => User::class,

            //     // uses the User.username property as the visible option string
            //     'choice_label' => 'username',
            //     'choice_value' => function (?User $entity) {
            //         return $entity ? $entity->getId() : '';
            //     },
            //     // used to render a select box, check boxes or radios
            //     //'multiple' => true,
            //     'expanded' => true,
            // ])
            ->add('owner', HiddenType::class, ['mapped' => 'false'])
            ->add('ownerLabel', HiddenType::class,);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Map::class,
        ]);
    }
}
