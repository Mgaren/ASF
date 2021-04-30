<?php

namespace App\Form;

use App\Entity\Section;
use App\Entity\SectionPlanning;
use App\Entity\SectionCategory;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SectionPlanningsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('section', EntityType::class, [
                'label' => 'section*',
                'required' => true,
                'class' => Section::class,
                'choice_label' => 'name',
                'multiple' => false,
                'expanded' => true,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('section')->addOrderBy('section.name', 'ASC');
                },
            ]);
        $builder->addEventListener(
            FormEvents::POST_SUBMIT,
            function (FormEvent $event) {
                $section = $event->getData();
                $form = $event->getForm();
                $builder = $form->getConfig()->getFormFactory()->createNamedBuilder(
                    'sectionCategory',
                    EntityType::class,
                    null,
                    [
                        'label' => 'Catégorie*',
                        'class' => SectionCategory::class,
                        'choice_label' => 'name',
                        'multiple' => true,
                        'expanded' => true,
                        'by_reference' => false,
                        'auto_initialize' => false,
                    ]
                );
                $form->getParent()->add($builder->getForm());
            }
        )
            ->add('day', ChoiceType::class, [
                'label' => 'Jour*',
                'required' => true,
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
                'label' => 'Horaire*',
                'required' => true,
            ])
            ->add('lieu', TextType::class, [
                'label' => 'Lieu d\'entrainement*',
                'required' => true,
            ])
            ->add('cotisation', TextType::class, [
                'label' => 'Cotisation',
                'required' => false,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => SectionPlanning::class,
        ]);
    }
}
