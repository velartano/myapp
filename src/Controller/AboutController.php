<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CategorieRepository;

class AboutController extends AbstractController
{
    /**
     * @Route("/about", name="app_about")
     */
    public function index(CategorieRepository $categorieRepository): Response
    {
        return $this->render('about/index.html.twig', [
            'controller_name' => 'AboutController',
            'categories' => $categorieRepository->findAll(),
        ]);
    }
}