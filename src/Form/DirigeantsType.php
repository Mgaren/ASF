<?php

namespace App\Form;

use App\Entity\Dirigeants;
use App\Entity\DirigeantsPost;
use Symfony\Component\Form\AbstractType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DirigeantsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname', TextType::class, [
                'label' => 'Prénom*',
            ])
            ->add('lastname', TextType::class, [
                'label' => 'Nom*',
            ])
            ->add('dirigeantsPost', EntityType::class, [
                'label' => 'Poste*',
                'class' => DirigeantsPost::class,
                'choice_label' => 'name',
                'multiple' => false,
                'expanded' => true,
                'by_reference' => false,
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
            'data_class' => Dirigeants::class,
        ]);
    }
}
