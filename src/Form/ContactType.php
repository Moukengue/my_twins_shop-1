<?php

namespace App\Form;
use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        
            ->add("email", EmailType::class)
            //On a rajouté un label et on a rendu le champ optionnel en
            // donnant la valeur false à l'attribut required
            ->add(
                'message',
                TextareaType::class,
                [
                    'label' => 'Votre message',
                      // Une des options les plus utilisées sur les formulaires est required, qui est par défaut à "true. Si vous voulez qu'un champ ne le soit pas, il faut passer required à false
                    'required' => false
                ]
            )
            ->add('save', SubmitType::class, [
                'label' => 'Envoyer le message'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ContactType::class,
        ]);
    }
}
