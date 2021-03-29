<?php

namespace App\Form;

use App\Entity\Salaries;
use App\Entity\SectionSalary;
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
            ])
            ->add('lastname', TextType::class, [
                'label' => 'Nom*',
            ])
            ->add('sectionSalary', EntityType::class, [
                'label' => "section*",
                'class' => SectionSalary::class,
                'choice_label' => 'name',
                'multiple' => true,
                'expanded' => true,
                'by_reference' => false,
                //'query_bulder' => function (EntityRepository $er) {
                //return $er->createQueryBuilder('sectionSalary')->addOrderBy('sectionSalary.name', 'ASC');
                //}
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
