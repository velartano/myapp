<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoriesTerrainController extends AbstractController
{
    /**
     * @Route("/categories/terrain", name="app_categories_terrain")
     */
    public function index(): Response
    {
        return $this->render('categories_terrain/index.html.twig', [
            'controller_name' => 'CategoriesTerrainController',
        ]);
    }
}
