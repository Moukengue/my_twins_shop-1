<?php

namespace App\Controller;

use App\Entity\Rubrique;
use App\Repository\RubriqueRepository;
use App\Repository\ProduitRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;



class RubriqueController extends AbstractController
{

    #[Route('/rubrique', name: 'app_rubrique')]
    public function rubrique(RubriqueRepository $rubriqueRepo, ProduitRepository $produitRepo): Response
    {
        $rubriques = $rubriqueRepo->FindAll();
        $nouveauxProduits = $produitRepo->findBy(array(), ['id' => 'DESC'], 5, null);

        return $this->render('rubrique/rubrique.html.twig', [
            "rubriques" => $rubriques,
            "nouveauxProduits" => $nouveauxProduits,
        ]
        );
    }
}
