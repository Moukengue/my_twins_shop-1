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

  {   
    // Je vérifier que utilisateur est connecté en me basant sur le role
    $this->denyAccessUnlessGranted('ROLE_USER');

    // Je récupere mon panier sur la session, si j'ai pas un panier je met un tableau vide []
    $panier =$session->get('panier',[]);

    // Je définie un variable $date, qui récupere la date du jour
    $date = new \DateTime('@'.strtotime('now'));

    // Je récupere l'utilisateur
    $utilisateur = $utilisateurRepo->find($this->getUser());

    // Si le panier est vide je redirectionne l"utilisateur vers accueil
    if($panier ===[]){
    $this->addFlash('message','votre panier est vide');
    return $this->redirectToRoute('accueil');
    }

    // Facture
    $facture = new facture();
    $facture->setAdresse($utilisateur->getAdresseFacturation());
    $facture->setModePaiement('carte Bancaire');
    $facture->setDateEmission($date);
    $facture->setReglement(1);
    $facture->setDateLimitePaiement(new \DateTime('@'.strtotime('+7 days')));
        
    // Le panier n'est pas vide, on crée la commande
    $commande =new commande();
    $commande->setDate($date);
    $commande->setNumero(Uniqid());
    //$commande->setReduction($reduction);
    $commande->setDateFacaturation($date);
    $commande->setDateReglement($date);
    $commande->setAdresse($utilisateur->getAdresseFacturation());
    $commande->setFacture($facture);
    $commande->setUtilisateur($this ->getUser() );
      
    // Livraison
    $livraison = new Livraison ();
    $livraison->setNumBon(Uniqid());
    $livraison->setAdresse($utilisateur->getAdresseLivraison());
    $livraison->setCommande($commande);

    // Je définie les variables
    $prixTotal = 0;
    $prixTotalHt =0;
    $tva = 0;
    // On parcourt le panier pour créer les détails de commande 
    foreach($panier as $item){
      // On va chercher le produit
      $produit = $produitRepo->find($item ['produit']);

      // On va chercher la quantité
      $quantite = $item ['quantite'];
      // dd($produit, $quantite);

      // On crée la lignecommande
      $ligneCommande = new LigneCommande();
      $ligneCommande->setProduit($produit);
      $ligneCommande->setPrixVente($produit->getPrix() * $quantite);
      $ligneCommande->setquantiteCommande($quantite);
      $ligneCommande->setCommande($commande);

      // Contient
      $contient = new Contient;
      $contient->setQteLivree ($quantite);
      $contient->setDateLivraison($date);
      $contient->setProduit($produit);
      $contient->setLivraison($livraison);

      // Je fais le total TTC du produit et je l'ajoute au total de mon panier
      $totalPrixProduit = $produit->getPrix() * $quantite;
      $prixTotal = $prixTotal + $totalPrixProduit;

      // Je fais le total HT du produit et je l'ajoute au total de mon panier
      $totalPrixHtProduit = $produit->getPrixHt() * $quantite;
      $prixTotalHt = $prixTotalHt + $totalPrixHtProduit;

      // Je définie la TVA total du panier
      $tva = $tva + ($prixTotal - $prixTotalHt );
    }

    // Je définie le prix total dans la commande
    $commande->setPrixTotal($prixTotal);

    // Je définie le prix total et la TVA dans la facture
    $facture->setMontantTtc($prixTotal);
    $facture->setTva($tva);

    return $this->render('commande/index.html.twig', [
        'controller_name' => 'CommandeController',
    ]);
  }
}
