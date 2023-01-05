<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CategorieRepository;

class AdminController extends AbstractController
{
    /**
     * @Route("/admi", name="app_admin")
     */
    public function index(CategorieRepository $categorieRepository): Response
    {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
            'categories' => $categorieRepository->findAll(),
        ]);
    }
}