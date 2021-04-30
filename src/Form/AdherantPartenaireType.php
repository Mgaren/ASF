<?php

namespace App\Form;

use App\Entity\AdherantPartenaire;
use App\Entity\PartenaireCategory;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AdherantPartenaireType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom du partenaire*',
                'required' => true,
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Description*',
                'required' => true,
            ])
            ->add('lien', TextType::class, [
                'label' => 'Lien Http*',
                'required' => true,
            ])
            ->add('fileimage', FileType::class, [
                'mapped' => false,
                'required' => false,
                'label' => 'Image*',
            ])
            ->add('partenaireCategory', EntityType::class, [
                'label' => 'Catégorie*',
                'required' => true,
                'class' => PartenaireCategory::class,
                'choice_label' => 'name',
                'multiple' => false,
                'expanded' => true,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('partenaireCategory')->addOrderBy('partenaireCategory.name', 'ASC');
                }
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => AdherantPartenaire::class,
        ]);
    }
}
