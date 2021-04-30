<?php

namespace App\Form;

use App\Entity\Salaries;
use App\Entity\Section;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
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
                'required' => true,
            ])
            ->add('lastname', TextType::class, [
                'label' => 'Nom*',
                'required' => true,
            ])
            ->add('section', EntityType::class, [
                'label' => "section*",
                'required' => true,
                'class' => Section::class,
                'choice_label' => 'name',
                'multiple' => true,
                'expanded' => true,
                'by_reference' => false,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('section')->addOrderBy('section.name', 'ASC');
                }
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
