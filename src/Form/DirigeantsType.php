<?php

namespace App\Form;

use App\Entity\Dirigeants;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
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
            ->add('post', ChoiceType::class, [
                'label' => 'Poste*',
                'choices' => [
                    'Président(e)' => 'Président(e)',
                    'Vice Président(e)' => 'Vice Président(e)',
                    'Trésorier(ère)' => 'Trésorier(ère)',
                    'Secrétaire' => 'Secrétaire',
                    'Membre' => 'Membre'
                ]
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
