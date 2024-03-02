<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\RubriqueRepository;
use App\Repository\ProduitRepository;
use App\Repository\UtilisateurRepository;

class AccueilController extends AbstractController
{
    #[Route('/', name: 'app_accueil')]
    public function index(RubriqueRepository $rubriqueRepo, ProduitRepository $produitRepo): Response
    {
        // Récupération de 6 rubriques
        $rubriques = $rubriqueRepo->findBy(array(), null, 6, null);
        $produits = $produitRepo->findBy(array(), null, 4, null);

        return $this->render('accueil/index.html.twig',[
            "rubriques" => $rubriques,
            "produits" => $produits,
        ]
        );
    }

    #[Route('/mon_compte', name: 'app_mon_compte')]
    public function monCompte(UtilisateurRepository $utilisateurRepo): Response
    {
        $infoUti = $utilisateurRepo->find($this->getUser());

        return $this->render('mon_compte/index.html.twig',[
            "infoUti" => $infoUti,
        ]
        );
    }
}
