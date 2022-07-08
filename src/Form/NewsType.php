<?php

namespace App\Form;

use App\Entity\News;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichFileType;

class NewsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, ["label" => false, "attr" => ["placeholder" => "Titre de l'évenement", "class" => "form-control"]])
            ->add('description', TextareaType::class, ["label" => false, "attr" => ["placeholder" => "Titre de l'évenment", "class" => "form-control"]])
            ->add('imageFile', VichFileType::class, [
                'required' => false,
                "delete_label" => "Supprimer l'image",
                "download_label" => "Visualiser l'image",
                "attr" => ["class" => "form-control"],
                "label" => "Illustration"

            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => News::class,
        ]);
    }
}
