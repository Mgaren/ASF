<?php

namespace App\Form;

use App\Entity\HomeAsf;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class HomeAsfType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('fileimage1', FileType::class, [
                'mapped' => false,
                'required' => false,
                'label' => '1ère image*',
            ])
            ->add('fileimage2', FileType::class, [
                'mapped' => false,
                'required' => false,
                'label' => '2ème image*',
            ])
            ->add('fileimage3', FileType::class, [
                'mapped' => false,
                'required' => false,
                'label' => '3ème image*',
            ])
            ->add('fileimage4', FileType::class, [
                'mapped' => false,
                'required' => false,
                'label' => '4ème image*',
            ])
            ->add('fileimage5', FileType::class, [
                'mapped' => false,
                'required' => false,
                'label' => '5ème image*',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => HomeAsf::class,
        ]);
    }
}
