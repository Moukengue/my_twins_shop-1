<?php

namespace App\Controller\Admin;

use App\Entity\SousRubrique;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;

class SousRubriqueCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return SousRubrique::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
        ->setEntityLabelInSingular('Sous-Rubrique')
        ->setDateFormat('Sous-Rubrique');
    }

    //ConfigureFields permet d'afficher le contenu des entités
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
            ->hideOnForm(),
            TextField::new('nom'),
            AssociationField::new('rubrique', 'Rubrique'),
            TextField::new('image'),
            
          
        ];
    }
    
}
