<?php

namespace App\Form;

use App\Entity\Formation;
use App\Entity\LearningCategory;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LearningCategoryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, ["label" => false, "attr" => ["class" => "form-control mx-auto  my-3", "placeholder" => "Nom du thème"]])
            ->add('formations', EntityType::class, ["class" => Formation::class, "choice_label" => "name", "expanded" => true, "multiple" => true, "label" => false, "attr" => ["class" => "form-control mx-auto  my-3 "]]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => LearningCategory::class,
        ]);
    }
}
