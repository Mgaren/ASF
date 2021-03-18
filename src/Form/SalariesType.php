<?php

namespace App\Form;

use App\Entity\Salaries;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SalariesType extends AbstractType
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
            ->add('firstsection', ChoiceType::class, [
                'label' => "1ère section*",
                'choices' => [
                    '' => null,
                    'Omnisport' => 'Omnisport',
                    'Athlétisme' => 'Athlétisme',
                    'Badminton' => 'Badminton',
                    'Basketball' => 'Basketball',
                    'Ecole de sport' => 'Ecole de sport',
                    'Football' => 'Football',
                    'Judo' => 'Judo',
                    'Karaté do' => 'Karaté do',
                    'Natation' => 'Natation',
                    'Pétanque' => 'Pétanque',
                    'Squash' => 'Squash',
                    'Tennis' => 'Tennis',
                    'Tennis de table' => 'Tennis de table',
                    'VTT' => 'VTT'
                ]
            ])
            ->add('secondsection', ChoiceType::class, [
                'label' => "2ème section",
                'required' => false,
                'choices' => [
                    'Omnisport' => 'Omnisport',
                    'Athlétisme' => 'Athlétisme',
                    'Badminton' => 'Badminton',
                    'Basketball' => 'Basketball',
                    'Ecole de sport' => 'Ecole de sport',
                    'Football' => 'Football',
                    'Judo' => 'Judo',
                    'Karaté do' => 'Karaté do',
                    'Natation' => 'Natation',
                    'Pétanque' => 'Pétanque',
                    'Squash' => 'Squash',
                    'Tennis' => 'Tennis',
                    'Tennis de table' => 'Tennis de table',
                    'VTT' => 'VTT'
                ]
            ])
            ->add('thridsection', ChoiceType::class, [
                'label' => "3ème section",
                'required' => false,
                'choices' => [
                    'Omnisport' => 'Omnisport',
                    'Athlétisme' => 'Athlétisme',
                    'Badminton' => 'Badminton',
                    'Basketball' => 'Basketball',
                    'Ecole de sport' => 'Ecole de sport',
                    'Football' => 'Football',
                    'Judo' => 'Judo',
                    'Karaté do' => 'Karaté do',
                    'Natation' => 'Natation',
                    'Pétanque' => 'Pétanque',
                    'Squash' => 'Squash',
                    'Tennis' => 'Tennis',
                    'Tennis de table' => 'Tennis de table',
                    'VTT' => 'VTT'
                ]
            ])
            ->add('fourthsection', ChoiceType::class, [
                'label' => "4ème section",
                'required' => false,
                'choices' => [
                    'Omnisport' => 'Omnisport',
                    'Athlétisme' => 'Athlétisme',
                    'Badminton' => 'Badminton',
                    'Basketball' => 'Basketball',
                    'Ecole de sport' => 'Ecole de sport',
                    'Football' => 'Football',
                    'Judo' => 'Judo',
                    'Karaté do' => 'Karaté do',
                    'Natation' => 'Natation',
                    'Pétanque' => 'Pétanque',
                    'Squash' => 'Squash',
                    'Tennis' => 'Tennis',
                    'Tennis de table' => 'Tennis de table',
                    'VTT' => 'VTT'
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
            'data_class' => Salaries::class,
        ]);
    }
}
