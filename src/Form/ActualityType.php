<?php

namespace App\Form;

use App\Entity\Actuality;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ActualityType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date', TextType::class, [
                'label' => 'Date*',
                'required' => true,
            ])
            ->add('titre', TextType::class, [
                'label' => 'Titre*',
                'required' => true,
            ])
            ->add('description', TextareaType::class, [
                'label' => '1er Paragraphe*',
                'required' => true,
            ])
            ->add('description2', TextareaType::class, [
                'required' => false,
                'label' => '2ème Paragraphe'
            ])
            ->add('description3', TextareaType::class, [
                'required' => false,
                'label' => '3ème Paragraphe'
            ])
            ->add('description4', TextareaType::class, [
                'required' => false,
                'label' => '4ème Paragraphe'
            ])
            ->add('description5', TextareaType::class, [
                'required' => false,
                'label' => '5ème Paragraphe'
            ])
            ->add('description6', TextareaType::class, [
                'required' => false,
                'label' => '6ème Paragraphe'
            ])
            ->add('description7', TextareaType::class, [
                'required' => false,
                'label' => '7ème Paragraphe'
            ])
            ->add('description8', TextareaType::class, [
                'required' => false,
                'label' => '8ème Paragraphe'
            ])
            ->add('description9', TextareaType::class, [
                'required' => false,
                'label' => '9ème Paragraphe'
            ])
            ->add('description10', TextareaType::class, [
                'required' => false,
                'label' => '10ème Paragraphe'
            ])
            ->add('fileimage', FileType::class, [
                'mapped' => false,
                'required' => false,
                'label' => 'Image',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Actuality::class,
        ]);
    }
}
