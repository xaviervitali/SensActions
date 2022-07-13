<?php

namespace App\Form;

use App\Entity\Formation;
use App\Entity\LearningCategory;
use phpDocumentor\Reflection\PseudoTypes\Numeric_;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\PercentType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichFileType;

class FormationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, ["label" => false, "attr" => ["placeholder" => "Nom de la formation", "class" => "form-control col-4 "]])
            ->add('moreInfo', TextType::class, ["label" => false, "attr" => ["placeholder" => "Les plus de la formation", "class" => "form-control col-4 "]])
            ->add('handicap', TextType::class, ["label" => false, "attr" => ["placeholder" => "Accessibilité", "class" => "form-control col-4 "]])
            ->add('intervenants', TextType::class, ["label" => false, "attr" => ["placeholder" => "Intervenants", "class" => "form-control col-4 "]])
            ->add('public', TextType::class, ["label" => false, "attr" => ["placeholder" => "Public", "class" => "form-control col-4"]])
            ->add('duration', TextType::class, ["label" => false, "attr" => ["placeholder" => "Durée", "class" => "form-control "]])
            ->add('prerequisite', TextType::class, ["label" => false, "attr" => ["placeholder" => "Pré-requis", "class" => "form-control "]])
            ->add('participants', NumberType::class, ["label" => false, "required" => false, "attr" => ["placeholder" => "Nombre de personnes formées", "class" => "form-control "]])
            ->add('satisfaction', PercentType::class, ["label" => false, "required" => false, "symbol" => false, "attr" => ["placeholder" => "Taux de satistaction", "class" => "form-control "]])
            ->add('successRate', PercentType::class, ["label" => false, "required" => false, "symbol" => false, "attr" => ["placeholder" => "Taux de réussite", "class" => "form-control "]])
            ->add('goal', TextareaType::class, ["label" => false, "attr" => ["placeholder" => "Objectifs de la formation", "class" => "form-control "]])
            ->add('program', TextareaType::class, ["label" => false, "attr" => ["placeholder" => "Programme de la formation", "class" => "form-control "]])
            ->add('method', TextType::class, ["label" => false, "attr" => ["placeholder" => "Pédagogie", "class" => "form-control "]])
            ->add('validation', TextareaType::class, ["label" => false, "attr" => ["placeholder" => "Validation", "class" => "form-control "]])
            ->add('competences', TextareaType::class, ["label" => false, "attr" => ["placeholder" => "Compétences", "class" => "form-control "]])
            ->add('certification', CheckboxType::class, ['required' => false, "label" => "Certifiante", "attr" => ["disabled" => "disabled", "class" => "form-check-input"]])
            ->add('cpf', CheckboxType::class, ['required' => false, "label" => "Eligible au CPF", "attr" => ["disabled" => "disabled", "class" => "form-check-input"]])
            ->add('enabled', CheckboxType::class, ['required' => false, "label" =>  "Activée", "attr" => ["class" => "form-check-input"]])
            ->add('uploadedFile', VichFileType::class, [
                'required' => false,
                "delete_label" => "Supprimer le fichier",
                "download_label" => "Visualiser le fichier",
                "attr" => ["class" => "form-control"],
            ])
            ->add('learningCategories', EntityType::class, ["label" => "Thèmes de formations", "required" => true, "class" => LearningCategory::class, "choice_label" => "name", "expanded" => true, "multiple" => true, "attr" => ["class" => " "]]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Formation::class,
        ]);
    }
}
