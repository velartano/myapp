<?php

namespace App\Controller;

use App\Entity\Safer;
use App\Repository\BienImmmobilierRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\BienImmobilierRepository;
use App\Repository\CategorieRepository;
class bodyController extends AbstractController
{
    /**
     * @Route("/body/home")
     */
    public function index(BienImmobilierRepository $saferRepository, CategorieRepository $categorieRepository): Response
    {
        return $this->render('bodyHome.html.twig', [
            'biens' => $saferRepository->findAll(),
            'categories' => $categorieRepository->findAll(),
        ]);
    }
}