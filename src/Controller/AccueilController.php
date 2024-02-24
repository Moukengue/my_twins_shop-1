<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\RubriqueRepository;
use symfony\Repository\SousRubriqueRepository;

class AccueilController extends AbstractController

{

    #[Route('/', name: 'app_accueil')]
    public function index(RubriqueRepository $rubriqueRepo): Response
    {
        // Récupération de 6 rubriques
        $rubriques = $rubriqueRepo->findBy(array(), null, 6, null);

        return $this->render('accueil/index.html.twig',[
            "rubriques"=>$rubriques,
        ]
        );
    }
}
