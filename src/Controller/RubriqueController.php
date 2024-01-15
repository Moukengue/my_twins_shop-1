<?php

namespace App\Controller;

use App\Entity\Rubrique;
use App\Repository\RubriqueRepository;
use Symfony\Component\HttpFoundation\Response;
use symfony\Repository\SousRubriqueRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;



class RubriqueController extends AbstractController
{

    #[Route('/rubrique/{rubrique}', name: 'app_rubrique')]
    public function rubrique(Rubrique $rubrique): Response
    {
        // $rubriques=$rubriqueRepo->FindAll();
        return $this->render('rubrique/rubrique.html.twig',[
            "rubrique"=>$rubrique,
        ]
        );
    }
}
