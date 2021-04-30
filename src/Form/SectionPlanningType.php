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
use Symfony\Component\OptionsResolver\OptionsResolver;

class SectionPlanningType extends AbstractType
{
    /*private ?int $sectionId = null;*/
    private EntityManagerInterface $entityManager;

    /**
     * SectionPlanningType constructor.
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $categories = [];
        $rows = $this->entityManager->createQuery('select s.id as section, c.name, c.id
        as category from App:SectionCategory c join c.section s order by s.id ASC, c.name ASC')->getScalarResult();

        foreach ($rows as $row) {
            if (isset($categories[$row["section"]])) {
                $categories[$row["section"]][$row["category"]] = $row["name"];
            } else {
                $categories[$row["section"]] = [];
                $categories[$row["section"]][$row["category"]] = $row["name"];
            }
        }
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
                'attr' => ['data-categories' => json_encode($categories)],
            ])
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
            ])
            ->add('sectionCategory', EntityType::class, [
                'label' => 'Catégorie*',
                'class' => SectionCategory::class,
                'choice_label' => 'name',
                'multiple' => true,
                'expanded' => true,
                'by_reference' => false,
                'query_builder' => function (EntityRepository $er) {
                    return $er
                        ->createQueryBuilder('sectionCategory')
                        ->addOrderBy('sectionCategory.id', 'ASC');
                }
            ]);
        /*$builder->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $event) {
            $section = $event->getData();
            $form = $event->getForm();

            if ($section && $section->getId()) {
                $form->add('sectionCategory', EntityType::class, [
                    'label' => 'Catégorie*',
                    'class' => SectionCategory::class,
                    'choice_label' => 'name',
                    'multiple' => true,
                    'expanded' => true,
                    'by_reference' => false,
                    'query_builder' => function (EntityRepository $er) {
                        return $er
                            ->createQueryBuilder('sectionCategory')
                            ->andWhere('sectionCategory.section_id', $this->sectionId)
                            ->addOrderBy('sectionCategory.id', 'ASC');
                    }
                ]);
            }
        });*/
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => SectionPlanning::class,
        ]);
    }
}
