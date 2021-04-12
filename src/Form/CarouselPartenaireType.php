<?php

namespace App\Form;

use App\Entity\CarouselPartenaire;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CarouselPartenaireType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('fileimage1', FileType::class, [
                'mapped' => false, 'required' => false, 'label' => '1ère image',
            ])
            ->add('fileimage2', FileType::class, [
                'mapped' => false, 'required' => false, 'label' => '2ème image',
            ])
            ->add('fileimage3', FileType::class, [
                'mapped' => false, 'required' => false, 'label' => '3ème image',
            ])
            ->add('fileimage4', FileType::class, [
                'mapped' => false, 'required' => false, 'label' => '4ème image',
            ])
            ->add('fileimage5', FileType::class, [
                'mapped' => false, 'required' => false, 'label' => '5ème image',
            ])
            ->add('fileimage6', FileType::class, [
                'mapped' => false, 'required' => false, 'label' => '6ème image',
            ])
            ->add('fileimage7', FileType::class, [
                'mapped' => false, 'required' => false, 'label' => '7ème image',
            ])
            ->add('fileimage8', FileType::class, [
                'mapped' => false, 'required' => false, 'label' => '8ème image',
            ])
            ->add('fileimage9', FileType::class, [
                'mapped' => false, 'required' => false, 'label' => '9ème image',
            ])
            ->add('fileimage10', FileType::class, [
                'mapped' => false, 'required' => false, 'label' => '10ème image',
            ])
            ->add('fileimage11', FileType::class, [
                'mapped' => false, 'required' => false, 'label' => '11ème image',
            ])
            ->add('fileimage12', FileType::class, [
                'mapped' => false, 'required' => false, 'label' => '12ème image',
            ])
            ->add('fileimage13', FileType::class, [
                'mapped' => false, 'required' => false, 'label' => '13ème image',
            ])
            ->add('fileimage14', FileType::class, [
                'mapped' => false, 'required' => false, 'label' => '14ème image',
            ])
            ->add('fileimage15', FileType::class, [
                'mapped' => false, 'required' => false, 'label' => '15ème image',
            ])
            ->add('fileimage16', FileType::class, [
                'mapped' => false, 'required' => false, 'label' => '16ème image',
            ])
            ->add('fileimage17', FileType::class, [
                'mapped' => false, 'required' => false, 'label' => '17ème image',
            ])
            ->add('fileimage18', FileType::class, [
                'mapped' => false, 'required' => false, 'label' => '18ème image',
            ])
            ->add('fileimage19', FileType::class, [
                'mapped' => false, 'required' => false, 'label' => '19ème image',
            ])
            ->add('fileimage20', FileType::class, [
                'mapped' => false, 'required' => false, 'label' => '20ème image',
            ])
            ->add('fileimage21', FileType::class, [
                'mapped' => false, 'required' => false, 'label' => '21ème image',
            ])
            ->add('fileimage22', FileType::class, [
                'mapped' => false, 'required' => false, 'label' => '22ème image',
            ])
            ->add('fileimage23', FileType::class, [
                'mapped' => false, 'required' => false, 'label' => '23ème image',
            ])
            ->add('fileimage24', FileType::class, [
                'mapped' => false, 'required' => false, 'label' => '24ème image',
            ])
            ->add('fileimage25', FileType::class, [
                'mapped' => false, 'required' => false, 'label' => '25ème image',
            ])
            ->add('fileimage26', FileType::class, [
                'mapped' => false, 'required' => false, 'label' => '26ème image',
            ])
            ->add('fileimage27', FileType::class, [
                'mapped' => false, 'required' => false, 'label' => '27ème image',
            ])
            ->add('fileimage28', FileType::class, [
                'mapped' => false, 'required' => false, 'label' => '28ème image',
            ])
            ->add('fileimage29', FileType::class, [
                'mapped' => false, 'required' => false, 'label' => '29ème image',
            ])
            ->add('fileimage30', FileType::class, [
                'mapped' => false, 'required' => false, 'label' => '30ème image',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => CarouselPartenaire::class,
        ]);
    }
}
