<?php

namespace App\Controller;
use App\Entity\Commande;
use App\Entity\LigneCommande;
use App\Repository\ProduitRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class CommandeController extends AbstractController
{
    #[Route('/commande', name: 'app_commande')]
    public function index(SessionInterface $session,ProduitRepository $produitRepo): Response

    {   //je vérifier que utilisateur est connecté en me basant sur le role
        $this->denyAccessUnlessGranted('ROLE_USER');
        // je récuperer mon panier sur mon session, si j'ai pas un panier je met un tableau vide []
        $panier =$session->get('panier',[]);
       // si mon panier est vide je lui redirectionne dans mon accueil
       if($panier ===[]){
        $this->addFlash('message','votre panier est vide');
       return $this->redirectToRoute('accueil');
       }
       //Le panier n'est pas vide,on crée la commande
     $commande =new commande();

     //On parcourt le panier pour créer les détails de commande 
     foreach($panier as $item){
        $ligneCommande =new LigneCommande();

        //on va chercher le produit

        $produit = $produitRepo->find($item ['produit']);
        //on va chercher la quantité
        $quantite = $item ['quantite'];
       // dd($produit,$quantite);
        
        $prix = $produit->getprix();

        // On crée le detail de mande
        $ligneCommande->setProduit($produit);
        $ligneCommande->setPrixVente($produit->getPrix()*$quantite);
        $ligneCommande->setquantiteCommande($quantite);
        $ligneCommande->setCommande($commande);

     }

        return $this->render('commande/index.html.twig', [
            'controller_name' => 'CommandeController',
        ]);
    }
}
