<?php

namespace App\Form;

use App\Entity\Section;
use App\Entity\SectionSport;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SectionSportType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('section', EntityType::class, [
                'label' => 'section*',
                'class' => Section::class,
                'choice_label' => 'name',
                'multiple' => false,
                'expanded' => true,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('section')->addOrderBy('section.name', 'ASC');
                }
            ])
            ->add('description1', TextareaType::class, [
                'label' => 'Description du sport*'
            ])
            ->add('description2', TextareaType::class, [
                'label' => 'Renseignement*'
            ])
            ->add('description3', TextareaType::class, [
                'label' => 'Info complémentaire*'
            ])
            ->add('fileimage', FileType::class, [
                'label' => 'Image / Logo*',
                'mapped' => false,
                'required' => false,
            ])
            ->add('lien', TextType::class, [
                'label' => 'Lien du site',
                'required' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => SectionSport::class,
        ]);
    }
}
