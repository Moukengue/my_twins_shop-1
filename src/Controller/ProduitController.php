<?php

namespace App\Controller;
use App\Entity\Produit;
use App\Entity\SousRubrique;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProduitController extends AbstractController
{
    #[Route('/produit/{sousrubrique}', name: 'app_produit')]
    public function produit(SousRubrique $sousrubrique): Response
    {
    
        return $this->render('produit/produit.html.twig', [
            'produit' =>$sousrubrique,
        ]);
    }
}


