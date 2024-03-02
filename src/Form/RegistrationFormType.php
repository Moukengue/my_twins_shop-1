<?php

namespace App\Form;

use App\Entity\Utilisateur;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('nom', TextType::class, [
            'label' => 'Nom',
            'attr' => [
                'placeholder' => 'Nom',
            ],
            'constraints' => [
                new NotBlank(['message' => 'Veuillez remplir ce champ']),
            ]
        ])
        ->add('prenom', TextType::class, [
            'label' => 'Prenom',
            'attr' => [
                'placeholder' => 'Prenom',
            ],
            'constraints' => [
                new NotBlank(['message' => 'Veuillez remplir ce champ']),
            ]
        ])
        ->add('email', EmailType::class, [
            'label' => 'E-mail',
            'attr' => [
                'placeholder' => 'utilisateur@gmail.com',
            ],
        ])
        ->add('fone', TextType::class, [
            'label' => 'Telephone',
            'attr' => [
                'placeholder' => 'Telephone',
            ],
        ])
        ->add('adresse_facturation', TextType::class, [
            'label' => 'Adresse de Facturation',
            'attr' => [
                'placeholder' => 'Adresse de Facturation',
            ],
        ])
        ->add('adresse_livraison', TextType::class, [
            'label' => 'Adresse de Livraison',
            'attr' => [
                'placeholder' => 'Adresse de Livraison',
            ],
        ])
        ->add('ville', TextType::class, [
            'label' => 'Ville',
            'attr' => [
                'placeholder' => 'Ville',
            ],
        ])
        ->add('ref', TextType::class, [
            'label' => 'Référence',
            'attr' => [
                'placeholder' => 'Référence',
            ],
        ])
        ->add('type', TextType::class, [
            'label' => 'Type',
            'attr' => [
                'placeholder' => 'Particulier ou Professionnel',
            ],
        ])
        ->add('siret', TextType::class, [
            'label' => 'N° de Siret',
            'attr' => [
                'placeholder' => 'N° de Siret',
            ],
        ])
        ->add('coef', TextType::class, [
            'label' => 'Coefficient',
            'attr' => [
                'placeholder' => 'Coefficient',
            ],
        ])
        ->add('cp', IntegerType::class, [
            'label' => 'Code postal',
            'attr' => [
                'placeholder' => 'Code Postal',
            ],
        ])
        ->add('agreeTerms', CheckboxType::class, [
            'mapped' => false,
            'attr' => [
                'class' => 'case',
            ],
            'constraints' => [
                new IsTrue([
                    'message' => 'Je souhaite recevoir les offres',
                ]),
            ],
            'label' => 'J\'accepte les conditions d\'utilisation et j\'ai pris connaissance de la politique vie privée et cookies.',
            'label_attr' => [
                'class' => 'condition_utilisation',
            ],
        ])
        ->add('plainPassword', PasswordType::class, [
            // instead of being set onto the object directly,
            // this is read and encoded in the controller
            'mapped' => false,
            'attr' => ['autocomplete' => 'new-password'],
            'constraints' => [
                new NotBlank([
                    'message' => 'Veuillez entrer un mot de passe',
                ]),
                new Length([
                    'min' => 6,
                    'minMessage' => 'Your password should be at least {{ limit }} characters',
                    // max length allowed by Symfony for security reasons
                    'max' => 4096,
                ]),
            ],
            'label' => 'Mot de passe',
        ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Utilisateur::class,
        ]);
    }
}
