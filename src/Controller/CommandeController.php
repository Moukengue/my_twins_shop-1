<?php

namespace App\Controller;
use App\Repository\UtilisateurRepository;
use App\Entity\Commande;
use App\Entity\Contient;
use App\Entity\Facture;
use App\Entity\Livraison;
use App\Entity\LigneCommande;
use App\Repository\ProduitRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class CommandeController extends AbstractController
{
    #[Route('/commande', name: 'app_commande')]
    public function index(SessionInterface $session,ProduitRepository $produitRepo,UtilisateurRepository $utilisateurRepo): Response

    {   //je vérifier que utilisateur est connecté en me basant sur le role
        $this->denyAccessUnlessGranted('ROLE_USER');
        // je récuperer mon panier sur mon session, si j'ai pas un panier je met un tableau vide []
        $panier =$session->get('panier',[]);
        $date = new \DateTime('@'.strtotime('now'));

        //user
        $utilisateur = $utilisateurRepo->find($this->getUser());
       // si mon panier est vide je lui redirectionne dans mon accueil
       if($panier ===[]){
        $this->addFlash('message','votre panier est vide');
       return $this->redirectToRoute('accueil');
       }


         
     //facture
      $facture =new facture();
       $facture->setAdresse($utilisateur->getAdresseFacturation());
       $facture->setModePaiement('carte Bancaire');
       $facture->setDateEmission($date);
       $facture->setReglement(1);
       $facture->setDateLimitePaiement(new \DateTime('@'.strtotime('+7 days')));
       
     
       //Le panier n'est pas vide,on crée la commande
       $commande =new commande();

      //Commande
      $commande->setDate($date);
      $commande->setNumero(Uniqid());
      //$commande->setReduction($reduction);
      $commande->setDateFacaturation($date);
      $commande->setDateReglement($date);
      $commande->setAdresse($utilisateur->getAdresseFacturation());
      $commande->setFacture($facture);
      $commande->setUtilisateur($this ->getUser() );
      
      //livraison
      $livraison = new Livraison ();
      $livraison->setNumBon(Uniqid());
      $livraison->setAdresse($utilisateur->getAdresseLivraison());
      $livraison->setCommande($commande);

     

       $prixTotal = 0;
       $prixTotalHt =0;
       $tva = 0;
      
     //On parcourt le panier pour créer les détails de commande 
     foreach($panier as $item){
        $ligneCommande =new LigneCommande();

        //on va chercher le produit

        $produit = $produitRepo->find($item ['produit']);
        //on va chercher la quantité
        $quantite = $item ['quantite'];
       // dd($produit,$quantite);
        
        $prix = $produit->getprix();

        // On crée la lignecommande
        $ligneCommande->setProduit($produit);
        $ligneCommande->setPrixVente($produit->getPrix()*$quantite);
        $ligneCommande->setquantiteCommande($quantite);
        $ligneCommande->setCommande($commande);
        $totalPrixProduit = $produit->getPrix()*$quantite;
        $prixTotal =   $prixTotal + $totalPrixProduit;

        $totalPrixHtProduit = $produit->getPrixHt()*$quantite;
        $prixTotalHt =   $prixTotalHt + $totalPrixHtProduit;
       $tva = $tva + ($prixTotal - $prixTotalHt );


       //contient
       $contient = new Contient;
       $contient->setQteLivree ($quantite);
       $contient->setDateLivraison($date);
       $contient->setProduit($produit);
       $contient->setLivraison($livraison);
     }
     //prixtotalcommande 
     $commande->setPrixTotal($prixTotal);
     $facture->setMontantTtc($prixTotal);
     $facture->setTva($tva);

        return $this->render('commande/index.html.twig', [
            'controller_name' => 'CommandeController',
        ]);
    }
}
