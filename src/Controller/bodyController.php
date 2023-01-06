<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Entity\Safer;
use App\Repository\BienImmmobilierRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\BienImmobilierRepository;
use App\Repository\CategorieRepository;
use App\Repository\MessageRepository;

class bodyController extends AbstractController
{
    /**
     * @Route("/body/home")
     */

    public function index(BienImmobilierRepository $saferRepository, categorieRepository $categorieRepository, MessageRepository $messageRepository): Response
    {
        return $this->render('bodyHome.html.twig', [
            'biens' => $saferRepository->findAll(),
            'categories' => $categorieRepository->findAll(),
            'Messages' => $messageRepository->findAll(),
        ]);
    }
}
