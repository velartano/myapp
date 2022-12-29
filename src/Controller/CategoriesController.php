<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CategorieRepository;
use App\Repository\BienImmobilierRepository;

class CategoriesController extends AbstractController
{
    /**
     * @Route("/categories/{id}", name="app_categories")
     */
    public function index(CategorieRepository $categorieRepository, int $id,BienImmobilierRepository $bienImmobilierRepository): Response
    {
        return $this->render('categories/index.html.twig', [
            'controller_name' => 'CategoriesController',
            'categories' => $categorieRepository->findAll(),
            'biens' => ($id != 0) ? $bienImmobilierRepository->findByCat($id) : $bienImmobilierRepository->findAll(),
        ]);
    }
}