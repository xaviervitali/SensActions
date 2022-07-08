<?php

namespace App\Form;

use App\Entity\Contact;
use PhpParser\Node\Stmt\Label;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('lastname', TextType::class, ["label" => false, "attr" => ["placeholder" => "Nom", "class" => "form-control "]])
            ->add('firstname', TextType::class, ["label" => false, "attr" => ["placeholder" => "Prénom", "class" => "form-control "]])
            ->add('phone', TextType::class, ["label" => false, "attr" => ["placeholder" => "Téléphone", "class" => "form-control"]])
            ->add('email', EmailType::class, ["label" => false, "attr" => ["placeholder" => "E-mail", "class" => "form-control"]])
            ->add('contactType', ChoiceType::class, ["label" => "Vous êtes", "expanded" => true, "choices" => ["Un particulier" => "particulier", "Une entreprise" => "entreprise"], "attr" => ["class" => ""]])
            ->add('message', TextareaType::class, ["label" => false, "attr" => ["placeholder" => "Message", "class" => "form-control"]])
            ->add("aggrements", CheckboxType::class, ["label" => "J'accepte de communiquer mes coordonnées personnelles qui
            seront traitées dans le cadre du respect du RGPD de Sens Actions.", "mapped" => false, "attr" => ["class" => "my-3"]]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
