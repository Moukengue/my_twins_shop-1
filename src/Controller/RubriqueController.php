<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\RubriqueRepository;

class RubriqueController extends AbstractController

{

    #[Route('/rubrique', name: 'app_rubrique')]
    public function rubrique(RubriqueRepository $rubriqueRepo): Response
    {
        $rubriques=$rubriqueRepo->FindAll();
        return $this->render('rubrique/rubrique.html.twig',[
            "rubriques"=>$rubriques,
        ]
        );
    }
}
