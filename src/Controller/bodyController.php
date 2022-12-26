<?php

namespace App\Controller;

use App\Entity\Safer;
use App\Repository\SaferRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class bodyController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function index(SaferRepository $saferRepository): Response
    {
        return $this->render('base.html.twig', [
            'controller_name' => 'AfficherBienController',
            'biens' => $saferRepository->findAll(),
        ]);
    }
}
