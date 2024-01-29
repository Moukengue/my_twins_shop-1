<?php

namespace App\Controller\Admin;

use App\Entity\Produit;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ProduitCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Produit::class;
    }

  Public function configureCrud(Crud $crud): Crud
  {
    return $crud
    ->setEntityLabelInSingular('Produit')
        ->setDateFormat('Produit');
  }

     //ConfigureFields permet d'afficher le contenu des entités
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextEditorField::new('description'),
            TextField::new('libelle'),
            TextField::new('photo'),
            TextField::new('prix'),
            TextField::new('prixHt'),
           
            
        ];
    }

}
