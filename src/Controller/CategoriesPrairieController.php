<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoriesPrairieController extends AbstractController
{
    /**
     * @Route("/categories/prairie", name="app_categories_prairie")
     */
    public function index(): Response
    {
        return $this->render('categories_prairie/index.html.twig', [
            'controller_name' => 'CategoriesPrairieController',
        ]);
    }
}
