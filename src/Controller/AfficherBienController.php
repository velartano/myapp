<?php

namespace App\Controller;

use App\Entity\Safer;
use App\Repository\BienImmobilierRepository;
use App\Repository\CategorieRepository;
use App\Repository\SaferRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AfficherBienController extends AbstractController
{
    /**
     * @Route("/afficher/bien", name="app_afficher_bien")
     */
    public function index(BienImmobilierRepository $bienImmobilierRepository, CategorieRepository $categorieRepository): Response
    {
        // dd($categorieRepository->findAll());
        return $this->render('afficher_bien/index.html.twig', [
            'controller_name' => 'AfficherBienController',
            'bienImmob' => $bienImmobilierRepository->findAll(),
            'categories' => $categorieRepository->findAll(),
        ]);
    }
}