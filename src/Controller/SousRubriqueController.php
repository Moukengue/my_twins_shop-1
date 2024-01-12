<?php

namespace App\Controller;
use symfony\Repository\SousRubriqueRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SousRubriqueController extends AbstractController
{
    #[Route('/sous_rubrique/{sousrubrique}', name: 'app_sous_rubrique')]
    public function sous_rubrique($rubrique,SousRubriqueRepository $sousrubriqueRepo): Response
    {
        $sousrubrique=$sousrubriqueRepo->find($rubrique);
        return $this->render('sous_rubrique/sous_rubrique.html.twig', [
            'controller_name' => 'SousRubriqueController',
            'sousrubrique' =>$sousrubrique,
        ]);
    }
}
