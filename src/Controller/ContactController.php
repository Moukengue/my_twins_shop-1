<?php

namespace App\Controller;


use App\Entity\Produit;
use App\Form\ContactType;
use App\Form\ProduitType;
use App\Repository\ProduitRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_ContactType')]
    public function index(Request $request): Response
    {


    $form = $this->createForm(ContactType::class);

    
        return $this->render('docForm/contact.html.twig', [
            'controller_name' => 'ContactController',
            'form' => $form
        ]);
    }
}