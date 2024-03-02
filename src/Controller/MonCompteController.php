<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Repository\UtilisateurRepository;
use App\Repository\CommandeRepository;

class MonCompteController extends AbstractController
{
    #[Route('/mon_compte', name: 'app_mon_compte')]
    public function monCompte(UtilisateurRepository $utilisateurRepo): Response
    { 
        $utilisateurInfo = $utilisateurRepo->find($this->getUser());

        return $this->render('mon_compte/index.html.twig', [
            'utilisateurInfo' => $utilisateurInfo,
        ]);
    }

    #[Route('/mon_compte/commande', name: 'app_mon_compte_commande')]
    public function monCompteCommande(CommandeRepository $commandeRepo): Response
    {
        $commandes = $commandeRepo->find($this->getUser());

        return $this->render('mon_compte/commande.html.twig', [
            'commandes' => $commandes
        ]);
    }
}