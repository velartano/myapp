<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategorieBatimentsController extends AbstractController
{
    /**
     * @Route("/categorie/batiments", name="app_categorie_batiments")
     */
    public function index(): Response
    {
        return $this->render('categorie_batiments/index.html.twig', [
            'controller_name' => 'CategorieBatimentsController',
        ]);
    }
}
