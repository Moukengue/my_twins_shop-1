<?php

namespace App\Controller;
use App\Entity\SousRubrique;
use App\Repository\SousRubriqueRepository;
use App\Repository\RubriqueRepository;
use App\Repository\ProduitRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SousRubriqueController extends AbstractController
{
    #[Route('/sous_rubrique/{rubrique}', name: 'app_sous_rubrique')]
    public function sous_rubrique($rubrique, SousRubriqueRepository $sousrubriqueRepo, RubriqueRepository $rubriqueRepo, ProduitRepository $produitRepo): Response
    {
        $sRubriques = $sousrubriqueRepo->findSousRubrique($rubrique);
        $rubrique = $rubriqueRepo->find($rubrique);
        $nouveauxProduits = $produitRepo->findBy(array(), ['id' => 'DESC'], 5, null);
        // dd($sousrubrique,$rubrique);

        return $this->render('sous_rubrique/sous_rubrique.html.twig', [
            'rubrique' => $rubrique,
            'sousRubriques' => $sRubriques,
            'nouveauxProduits' => $nouveauxProduits,
        ]);
    }
}

