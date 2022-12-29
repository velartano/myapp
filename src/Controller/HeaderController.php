<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\BienImmobilierRepository;
use App\Repository\CategorieRepository;

class HeaderController extends AbstractController
{
    /**
     * @Route("/", name="app_header")
     */
    public function index(BienImmobilierRepository $saferRepository, CategorieRepository $categorieRepository): Response
    {
        // dd($saferRepository->findAll());
        return $this->render('base.html.twig', [
            'controller_name' => 'HeaderController',
            'biens' => $saferRepository->findAll(),
            'categories' => $categorieRepository->findAll(),
        ]);
    }
}