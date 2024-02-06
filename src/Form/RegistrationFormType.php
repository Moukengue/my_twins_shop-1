<?php

namespace App\Form;

use App\Entity\Utilisateur;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
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
                'label_attr' => [
                    'class' => 'col-auto col-form-label col-form-label-sm',
                ],
                'attr' => [
                    'placeholder' => 'Nom',
                    'class' => 'form-control form-control-sm',
                ],
                'constraints' => [
                    new NotBlank(['message' => 'Veuillez remplir ce champ']),
                ]
            ])
            ->add('prenom', TextType::class, [
                'label' => 'Prenom',
                'label_attr' => [
                    'class' => 'col-auto col-form-label col-form-label-sm',
                ],
                'attr' => [
                    'placeholder' => 'Prenom',
                    'class' => 'form-control form-control-sm',
                ],
                'constraints' => [
                    new NotBlank(['message' => 'Veuillez remplir ce champ']),
                ]
            ])
            ->add('fone', TextType::class, [
                'label' => 'Telephone',
                'label_attr' => [
                    'class' => 'col-auto col-form-label col-form-label-sm',
                ],
                'attr' => [
                    'placeholder' => 'Telephone',
                    'class' => 'form-control form-control-sm',
                ],
            ])

            ->add('adresse_facturation', TextType::class, [
                'label' => 'adresse_facturation',
                'label_attr' => [
                    'class' => 'col-auto col-form-label col-form-label-sm',
                ],
                'attr' => [
                    'placeholder' => 'adresse_facturation',
                    'class' => 'form-control form-control-sm',
                ],
            ])
            ->add('adresse_livraison', TextType::class, [
                'label' => 'adresse_livraison',
                'label_attr' => [
                    'class' => 'col-auto col-form-label col-form-label-sm',
                ],
                'attr' => [
                    'placeholder' => 'adresse_livraison',
                    'class' => 'form-control form-control-sm',
                ],
            ])
            ->add('ville', TextType::class, [
                'label' => 'Ville',
                'attr' => ['class' => 'form-control'],
            ])
            ->add('ref', TextType::class, [
                'label' => 'Ref',
                'attr' => ['class' => 'form-control'],
            ])
            ->add('type', TextType::class, [
                'label' => 'Type',
                'attr' => ['class' => 'form-control'],
            ])
            ->add('siret', TextType::class, [
                'label' => 'Siret',
                'attr' => ['class' => 'form-control'],
            ])
            ->add('coef', TextType::class, [
                'label' => 'Coefficient',
                'attr' => ['class' => 'form-control'],
            ])




            ->add('cp', TextType::class, [
                'label' => 'Code postal',
                'attr' => ['class' => 'form-control'],
            ])
            ->add('email', EmailType::class, [
                'label' => 'E-mail',
                'label_attr' => [
                    'class' => 'col-sm-2 col-form-label',
                ],
                'attr' => [
                    'placeholder' => 'admin24@gmail.com',
                    'class' => 'form-control form-control-sm',
                ],
            ])

            ->add('agreeTerms', CheckboxType::class, [
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => 'Je souhaite recevoir les offres',
                    ]),
                ],
                'label' => 'J\'accepte les conditions d\'utilisation et j\'ai pris connaissance de la politique vie privée et cookies.',
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
                'label' => 'Mot de passé',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Utilisateur::class,
        ]);
    }
}
