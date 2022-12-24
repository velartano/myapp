<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoriesBoisController extends AbstractController
{
    /**
     * @Route("/categories/bois", name="app_categories_bois")
     */
    public function index(): Response
    {
        return $this->render('categories_bois/index.html.twig', [
            'controller_name' => 'CategoriesBoisController',
        ]);
    }
}
