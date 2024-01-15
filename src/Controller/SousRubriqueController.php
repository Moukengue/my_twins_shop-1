<?php

namespace App\Controller;
use App\Entity\SousRubrique;
use Symfony\Component\HttpFoundation\Response;
use symfony\Repository\SousRubriqueRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SousRubriqueController extends AbstractController
{
    #[Route('/sous_rubrique/{sousrubrique}', name: 'app_sous_rubrique')]
    public function sous_rubrique(SousRubrique $sousrubrique): Response
    {
        // $sousrubrique=$sousrubriqueRepo->find($rubrique);

        return $this->render('sous_rubrique/sous_rubrique.html.twig', [
            'controller_name' => 'SousRubriqueController',
            'sousrubrique' =>$sousrubrique,
        ]);
    }
}

