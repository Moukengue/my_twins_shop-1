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

          $rubrique2 = new Rubrique();
          $rubrique2->setNom("Tissage Ondule 24 pouces");
          $rubrique2->setImage("ondules-24-pouces.jpg");
          $manager->persist($rubrique2);

          $rubrique3 = new Rubrique();
          $rubrique3->setNom("Tissage Boucle");
          $rubrique3->setImage("tissageboucle.jpg");
          $manager->persist($rubrique3);

          //perruque
          $rubrique4 = new Rubrique();
          $rubrique4->setNom("Perruque Boucle");
          $rubrique4->setImage("perruqueboucle.webp");
          $manager->persist( $rubrique4);

          $rubrique5 = new Rubrique();
          $rubrique5->setNom("Perruque lisse foncé  roux, chocolat, 13x4");
          $rubrique5->setImage("perruque-lisse-rouxfonce.webp");
          $manager->persist( $rubrique5);

          $rubrique6 = new Rubrique();
          $rubrique6 ->setNom("Perruque Ondule, 13x4");
          $rubrique6 ->setImage("perruqueondule2.webp");
          $manager->persist( $rubrique6 );

           //Lace Frontal
           $rubrique7 = new Rubrique();
           $rubrique7->setNom("Lace frontal lisse");
           $rubrique7->setImage("Lace-Frontal-lisse.jpg");
           $manager->persist( $rubrique7);

           $rubrique8 = new Rubrique();
           $rubrique8->setNom("Lace frontal Boucle");
           $rubrique8->setImage("Lace-Frontal-lisse.jpg");
           $manager->persist( $rubrique8);

           $rubrique9 = new Rubrique();
           $rubrique9->setNom("Lace frontal Ondule");
           $rubrique9->setImage("laceboucle.webp");
           $manager->persist( $rubrique9);


           //SousRubrique
           //perruque 
           $sousRubrique10 = new SousRubrique();
           $sousRubrique10->setNom("Perruque Lise avec Frange");
           $sousRubrique10->setImage("perruquebouclefrange.webp");
          $rubrique4->addSousRubrique($sousRubrique10);
           $manager->persist( $sousRubrique10);

           $sousRubrique11 = new sousRubrique();
           $sousRubrique11->setNom("Perruque Boucle  avec Frange");
           $sousRubrique11 ->setImage("perruquelissefrange.jpg");
           $rubrique5->addSousRubrique($sousRubrique11);
          //  $sousrubrique11 ->setRubrique($rubrique6);
           $manager->persist( $sousRubrique11);


           $sousRubrique12 = new sousRubrique();
           $sousRubrique12->setNom("Perruque Boucle  avec Frange");
           $sousRubrique12 ->setImage("perruquebouclefrange.webp");
           $rubrique5->addSousRubrique($sousRubrique12);
          //  $sousrubrique12 ->setRubrique($rubrique7);
           $manager->persist($sousRubrique12);

           $sousRubrique12 = new sousRubrique();
           $sousRubrique12->setNom("Perruque avec Frange");
           $sousRubrique12 ->setImage("perruquelissefrange.jpg");
           $rubrique5->addSousRubrique($sousRubrique12);
          //  $sousrubrique12 ->setRubrique($rubrique7);
           $manager->persist($sousRubrique12);

           $sousRubrique12 = new sousRubrique();
           $sousRubrique12->setNom("Perruque avec Frange");
           $sousRubrique12 ->setImage("perruquelissefrange.jpg");
           $rubrique5->addSousRubrique($sousRubrique12);
          //  $rubrique7 ->addSousRubrique($rubrique7);
           $manager->persist($sousRubrique12);
        //    La liste des srTissage
         //    La liste des srlace

           
           
           //Liste des prosuits
           $produit13 = new Produit();
           $produit13 ->setLibelle("Perruque avec Frange");
           $produit13 ->setDescription("La frange longue avec des longs cheveux lisses, une coupe tendance indémodable.");
           $produit13 ->setPhoto("perruquelisecourt.webp");
           $produit13 ->setPrix(150.99);
           $produit13 ->setPrixHt(140.99);
           $produit13 ->setSousRubrique($sousRubrique12);
           $manager->persist($produit13);

           $produit14 = new Produit();
           $produit14 ->setLibelle("Perruque avec Frange");
           $produit14 ->setDescription("La frange longue avec des longs cheveux lisses, une coupe tendance indémodable.");
           $produit14 ->setPhoto("perruquelissefrange.jpg");
           $produit14 ->setPrix(150.99);
           $produit14 ->setPrixHt(140.99);
           $produit14 ->setSousRubrique($sousRubrique12);
           $manager->persist($produit14);

           $produit15 = new Produit();
           $produit15 ->setLibelle("Perruque avec Frange");
           $produit15 ->setDescription("La frange longue avec des longs cheveux lisses, une coupe tendance indémodable.");
           $produit15 ->setPhoto("lissecourt.webp");
           $produit15 ->setPrix(150.99);
           $produit15 ->setPrixHt(140.99);
           $produit15 ->setSousRubrique($sousRubrique12);
           $manager->persist($produit15);

           $produit16 = new Produit();
           $produit16 ->setLibelle("Perruque Boucle avec Frange");
           $produit16 ->setDescription("Perruques En Cheveux Humains Avec Frange Remy Curly Bob Perruques Pour Femmes Perruque Pleine Machine.");
           $produit16 ->setPhoto("lissecourt.webp");
           $produit16 ->setPrix(60.99);
           $produit16 ->setPrixHt(55.99);
           $produit16 ->setSousRubrique($sousRubrique10);
           $manager->persist($produit16);
            //    La liste des srTissage
             //    La liste des srLace


        $manager->flush();
    }
}
