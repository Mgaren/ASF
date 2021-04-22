<?php

namespace App\Form;

use App\Entity\SectionPlanning;
use App\Entity\SectionCategory;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SectionPlanningType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('day', ChoiceType::class, [
                'label' => 'Jour*',
                'choices' => [
                    'Lundi' => 'Lundi',
                    'Mardi' => 'Mardi',
                    'Mercredi' => 'Mercredi',
                    'Jeudi' => 'Jeudi',
                    'Vendredi' => 'Vendredi',
                    'Samedi' => 'Samedi',
                    'Dimanche' => 'Dimanche'
                ]
            ])
            ->add('time', TextType::class, [
                'label' => 'Horaire*'
            ])
            ->add('lieu', TextType::class, [
                'label' => 'Lieu d\'entrainement*'
            ])
            ->add('cotisation', TextType::class, [
                'label' => 'Cotisation',
                'required' => false,
            ])
            ->add('sectionCategory', EntityType::class, [
                'label' => 'Catégorie*',
                'class' => SectionCategory::class,
                'choice_label' => 'name',
                'multiple' => true,
                'expanded' => true,
                'by_reference' => false,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('sectionCategory')->addOrderBy('sectionCategory.id', 'ASC');
                }
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => SectionPlanning::class,
        ]);
    }
}
