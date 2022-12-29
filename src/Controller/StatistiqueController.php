<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CategorieRepository;

class StatistiqueController extends AbstractController
{
    /**
     * @Route("/statistique", name="app_statistique")
     */
    public function index(CategorieRepository $categorieRepository): Response
    {
        return $this->render('statistique/index.html.twig', [
            'controller_name' => 'StatistiqueController',
            'categories' => $categorieRepository->findAll(),
        ]);
    }
}