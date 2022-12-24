<?php

namespace App\Controller;

use App\Entity\Safer;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class bodyController extends AbstractController
{
    /**
     * @Route("/", name="app_afficher_bien")
     */
    public function index(ManagerRegistry $manager): Response
    {
        $repo = $this->$manager()->getRepository(Safer::class);

        $bien = $repo->findAll();

        return $this->render('afficher_bien/index.html.twig', [
            'controller_name' => 'AfficherBienController',
            'bienD' => $bien
            //
        ]);
    }
}
