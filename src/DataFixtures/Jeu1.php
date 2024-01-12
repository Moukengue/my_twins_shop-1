<?php

namespace App\DataFixtures;

use App\Entity\Rubrique;
use App\Entity\SousRubrique;
use App\Entity\Produit;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class Jeu1 extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        //Rubriques
        //Tissage
          $rubrique1 = new Rubrique();
          $rubrique1->setNom("Tissage Lisse 24 pouces");
          $rubrique1->setImage("tissage-bresilien-lisse-24-pouces.jpg");
          $manager->persist($rubrique1);

          $rubrique2 = new rubrique();
          $rubrique2->setNom("Tissage Ondule 24 pouces");
          $rubrique2->setImage("ondules-24-pouces.jpg");
          $manager->persist($rubrique2);

          $rubrique3 = new rubrique();
          $rubrique3->setNom("Tissage Boucle");
          $rubrique3->setImage("tissageboucle.jpg");
          $manager->persist($rubrique1);

          //perruque
          $rubrique4 = new rubrique();
          $rubrique4->setNom("Perruque Boucle");
          $rubrique4->setImage("perruqueboucle.webp");
          $manager->persist( $rubrique4);

          $rubrique5 = new rubrique();
          $rubrique5->setNom("Perruque lisse foncé  roux, chocolat, 13x4");
          $rubrique5->setImage("perruque-lisse-rouxfonce.webp");
          $manager->persist( $rubrique5);

          $rubrique6 = new rubrique();
          $rubrique6 ->setNom("Perruque Ondule, 13x4");
          $rubrique6 ->setImage("perruqueondule2.webp");
          $manager->persist( $rubrique6 );

           //Lace Frontal
           $rubrique7 = new rubrique();
           $rubrique7->setNom("Lace frontal lisse");
           $rubrique7->setImage("Lace-Frontal-lisse.jpg");
           $manager->persist( $rubrique7);

           $rubrique8 = new rubrique();
           $rubrique8->setNom("Lace frontal Boucle");
           $rubrique8->setImage("Lace-Frontal-lisse.jpg");
           $manager->persist( $rubrique8);

           $rubrique9 = new rubrique();
           $rubrique9->setNom("Lace frontal Ondule");
           $rubrique9->setImage("laceboucle.webp");
           $manager->persist( $rubrique3);


           //SousRubrique
           //perruque 
           $sousRubrique10 = new SousRubrique();
           $sousRubrique10->setNom("5586985");
           $sousRubrique10->setImage("perruquelissefranche.jpg");
          //  $sousrubrique10 ->setSousRubrique($sousrubrique10);
          $rubrique5->addSousRubrique($sousRubrique10);
           $manager->persist( $sousRubrique10);

           $sousRubrique11 = new sousRubrique();
           $sousRubrique11->setNom("perruque Ondule");
           $sousRubrique11 ->setImage("perruquelissefranche.jpg");
           $rubrique6->addSousRubrique($sousRubrique11);
          //  $sousrubrique11 ->setRubrique($rubrique6);
           $manager->persist( $sousRubrique11);


           $sousRubrique12 = new sousRubrique();
           $sousRubrique12->setNom("5455");
           $sousRubrique12 ->setImage("perruquelissefranche.jpg");
           $rubrique7->addSousRubrique($sousRubrique12);
          //  $sousrubrique12 ->setRubrique($rubrique7);
           $manager->persist($sousRubrique12);

        $manager->flush();
    }
}
