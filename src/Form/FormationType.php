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
            ->add('name', TextType::class, ["label" => "Nom de la formation", "attr" => ["placeholder" => "Nom de la formation", "class" => "form-control col-4 "]])
            ->add('moreInfo', TextType::class, ["label" => "Les plus de la formation", "attr" => ["placeholder" => "Les plus de la formation", "class" => "form-control col-4 "]])
            ->add('handicap', TextType::class, ["label" => "Accessibilité", "attr" => ["placeholder" => "Accessibilité", "class" => "form-control col-4 "]])
            ->add('intervenants', TextareaType::class, ["label" => "Intervenants", "attr" => ["placeholder" => "Intervenants", "class" => "form-control col-4 "]])
            ->add('public', TextType::class, ["label" => "Public", "attr" => ["placeholder" => "Public", "class" => "form-control col-4"]])
            ->add('duration', TextType::class, ["label" => "Durée", "attr" => ["placeholder" => "Durée", "class" => "form-control "]])
            ->add('prerequisite', TextType::class, ["label" => "Pré-requis", "attr" => ["placeholder" => "Pré-requis", "class" => "form-control "]])
            ->add('participants', NumberType::class, ["label" => "Nombre de personnes formées", "required" => false, "attr" => ["placeholder" => "Nombre de personnes formées", "class" => "form-control "]])
            ->add('satisfaction', PercentType::class, ["label" => "Taux de satistaction", "required" => false, "symbol" => false, "attr" => ["placeholder" => "Taux de satistaction", "class" => "form-control "]])
            ->add('successRate', PercentType::class, ["label" => "Taux de réussite", "required" => false, "symbol" => false, "attr" => ["placeholder" => "Taux de réussite", "class" => "form-control "]])
            ->add('goal', TextareaType::class, ["label" => "Objectifs de la formation", "attr" => ["placeholder" => "Objectifs de la formation", "class" => "form-control "]])
            ->add('organization', TextareaType::class, ["label" => "Organisation de la formation", "attr" => ["placeholder" => "Organisation de la formation", "class" => "form-control "]])
            ->add('program', TextareaType::class, ["label" => "Programme de la formation", "attr" => ["placeholder" => "Programme de la formation", "class" => "form-control "]])
            ->add('method', TextType::class, ["label" => "Pédagogie", "attr" => ["placeholder" => "Pédagogie", "class" => "form-control "]])
            ->add('validation', TextareaType::class, ["label" => "Validation", "attr" => ["placeholder" => "Validation", "class" => "form-control "]])
            ->add('competences', TextareaType::class, ["label" => "Compétences", "attr" => ["placeholder" => "Compétences", "class" => "form-control "]])
            ->add('certification', CheckboxType::class, ['required' => false, "label" => "Certifiante", "attr" => ["disabled" => "disabled", "class" => "form-check-input"]])
            ->add('cpf', CheckboxType::class, ['required' => false, "label" => "Eligible au CPF", "attr" => ["disabled" => "disabled", "class" => "form-check-input"]])
            ->add('enabled', CheckboxType::class, ['required' => false, "label" =>  "Activée", "attr" => ["class" => "form-check-input"]])
            ->add('uploadedFile', VichFileType::class, [
                "label" => "Fichier",
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
