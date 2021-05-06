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
    private EntityManagerInterface $emi;
    public function __construct(EntityManagerInterface $emi)
    {
        $this->emi = $emi;
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
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
        $builder->addEventListener(FormEvents::PRE_SET_DATA, array($this, 'onPreSetData'));
        $builder->addEventListener(FormEvents::PRE_SUBMIT, array($this, 'onPreSubmit'));
    }

    protected function addElements(FormInterface $form, Section $section = null): void
    {
        $form->add('section', EntityType::class, [
            'required' => true,
            'label' => 'section*',
            'data' => $section,
            'placeholder' => 'Selectionner une section',
            'class' => Section::class,
            'multiple' => false,
            'expanded' => false,
            'query_builder' => function (EntityRepository $er) {
                return $er->createQueryBuilder('section')->addOrderBy('section.name', 'ASC');
            },
        ]);

        $sectionCategories = [];

        if ($section) {
            $repoSectionCategory = $this->emi->getRepository(SectionCategory::class);

            $sectionCategories = $repoSectionCategory->createQueryBuilder("s")
                ->where("s.section = :section_id")
                ->setParameter("section_id", $section->getId())
                ->getQuery()
                ->getResult();
        }

        $form->add('sectionCategory', EntityType::class, [
            'required' => true,
            'label' => 'Categorie*',
            'placeholder' => 'Selectionner une section',
            'class' => SectionCategory::class,
            'choices' => $sectionCategories,
            'auto_initialize' => false,
            'multiple' => true,
            'expanded' => false,
            'by_reference' => false,
        ]);
    }

    public function onPreSubmit(FormEvent $event): void
    {
        $form = $event->getForm();
        $data = $event->getData();

        $section = $this->emi->getRepository(Section::class)->find($data['section']);

        $this->addElements($form, $section);
    }

    public function onPreSetData(FormEvent $event): void
    {
        $sectionPlanning = $event->getData();
        $form = $event->getForm();

        $section = $sectionPlanning->getSection() ?: null;

        $this->addElements($form, $section);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => SectionPlanning::class,
        ]);
    }
}
