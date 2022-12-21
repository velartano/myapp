<?php

namespace App\Controller;

use App\Entity\Bien;
use App\Entity\Categories;
use Doctrine\ORM\EntityManager;
use App\Repository\CategoriesRepository;
use App\Repository\BienRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\Persistence\ManagerRegistry;



use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AccueilController extends AbstractController
{
    /**
     * @Route("/accueil", name="app_accueil")
     */
    public function index(ManagerRegistry $em): Response
    {
        #$br = $em->getManager();

        $entityManager = $em->getManager();
        $entityManager = $em->getRepository(Categories::class);

        $categorie = new Categories();

        $categorie->setTypeCat("terrain agricole");

        #$bien = new Bien;
        #$bien->setCp(35700);
        #$bien->setPrix(1500000);
        #$bien->setUrl('Marseille');
        #$bien->setTitre("Maison immobilier en Construction");

        #$entityManager->persist($categorie);
        #$entityManager->flush();

        #return new Response('Saved new product with id ' . $categorie->getId());

        return $this->render('accueil/index.html.twig', [
            'controller_name' => 'AccueilController',
        ]);
    }
}
