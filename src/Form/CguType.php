<?php

namespace App\Form;

use App\Entity\Cgu;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CguType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('description1', TextareaType::class, [
                'label' => '1er paragraphe*',
                'required' => true,
            ])
            ->add('description2', TextareaType::class, [
                'label' => '2ème paragraphe*',
                'required' => true,
            ])
            ->add('description3', TextareaType::class, [
                'label' => '3ème paragraphe*',
                'required' => true,
            ])
            ->add('description4', TextareaType::class, [
                'label' => '4ème paragraphe*',
                'required' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Cgu::class,
        ]);
    }
}
