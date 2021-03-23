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
            ->add('image1', FileType::class, [
                'mapped' => false,
                'required' => false,
                'label' => '1ère image',
            ])
            ->add('image2', FileType::class, [
                'mapped' => false,
                'required' => false,
                'label' => '2ème image',
            ])
            ->add('image3', FileType::class, [
                'mapped' => false,
                'required' => false,
                'label' => '3ème image',
            ])
            ->add('image4', FileType::class, [
                'mapped' => false,
                'required' => false,
                'label' => '4ème image',
            ])
            ->add('image5', FileType::class, [
                'mapped' => false,
                'required' => false,
                'label' => '5ème image',
            ])
            ->add('image6', FileType::class, [
                'mapped' => false,
                'required' => false,
                'label' => '6ème image',
            ])
            ->add('image7', FileType::class, [
                'mapped' => false,
                'required' => false,
                'label' => '7ème image',
            ])
            ->add('image8', FileType::class, [
                'mapped' => false,
                'required' => false,
                'label' => '8ème image',
            ])
            ->add('image9', FileType::class, [
                'mapped' => false,
                'required' => false,
                'label' => '9ème image',
            ])
            ->add('image10', FileType::class, [
                'mapped' => false,
                'required' => false,
                'label' => '10ème image',
            ])
            ->add('image11', FileType::class, [
                'mapped' => false,
                'required' => false,
                'label' => '11ème image',
            ])
            ->add('image12', FileType::class, [
                'mapped' => false,
                'required' => false,
                'label' => '12ème image',
            ])
            ->add('image13', FileType::class, [
                'mapped' => false,
                'required' => false,
                'label' => '13ème image',
            ])
            ->add('image14', FileType::class, [
                'mapped' => false,
                'required' => false,
                'label' => '14ème image',
            ])
            ->add('image15', FileType::class, [
                'mapped' => false,
                'required' => false,
                'label' => '15ème image',
            ])
            ->add('image16', FileType::class, [
                'mapped' => false,
                'required' => false,
                'label' => '16ème image',
            ])
            ->add('image17', FileType::class, [
                'mapped' => false,
                'required' => false,
                'label' => '17ème image',
            ])
            ->add('image18', FileType::class, [
                'mapped' => false, 'required' => false, 'label' => '18ème image',
            ])
            ->add('image19', FileType::class, [
                'mapped' => false, 'required' => false, 'label' => '19ème image',
            ])
            ->add('image20', FileType::class, [
                'mapped' => false, 'required' => false, 'label' => '20ème image',
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
