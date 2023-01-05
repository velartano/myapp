<?php

namespace App\Controller;

use App\Entity\BienImmobilier;
use App\Entity\Favoris;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use App\Form\Type\BienType;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\BienImmobilierRepository;


class BienController extends AbstractController
{
    /**
     * @Route("/bien", name="app_bien")
     */
        public function index(ManagerRegistry $doctrine, Request $request): Response
    {

        $entityManager = $doctrine->getManager();
        $bien = new BienImmobilier();

        $form = $this->createForm(BienType::class, $bien);
        $form->handleRequest($request);
         if ($form->isSubmitted() && $form->isValid()) {
            $bien = $form->getData();
             // tell Doctrine you want to (eventually) save the Product (no queries yet)
            $entityManager->persist($bien);

            // actually executes the queries (i.e. the INSERT query)
            $entityManager->flush();
            return $this->redirectToRoute('app_bien');
        }
        
        return $this->render('bien/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    /**
     * @Route("/bien/addToFavoris/{id}", name="app_bien_add_to_favs")
     */
    public function addToFavoris(ManagerRegistry $doctrine, Request $request, int $id): Response
    {
        $entityManager = $doctrine->getManager();

        if (empty($_COOKIE['favoris'])) {
            $_COOKIE['favoris'] = $id;
        } else {
            $favs = explode(";", $_COOKIE['favoris']);
            $favs[] = $id;
            $_COOKIE['favoris'] = implode(";", $favs);
        }
        // dd($_COOKIE['favoris']);

        // Retour sur la vue précédente
        $favs = explode(";", $_COOKIE['favoris']);
        $route = $request->headers->get('referer');
        return $this->redirectToRoute('app_afficher_bien', [
            "favs" => $favs,
        ]);
    }
    /**
     * @Route("/bien/sendFavoris", name="app_bien_send_favs")
     */
    public function sendFavorisInMail(ManagerRegistry $doctrine, Request $request, int $id): Response
    {
        $entityManager = $doctrine->getManager();

        $favoris = explode(";", $_COOKIE['favoris']);
        foreach ($favoris as $id_fav){
            $fav = new Favoris();
            $fav->setDate(new \DateTime());
            $fav->setIdBien($id_fav);
            $fav->setEmailPorteur($request->query->get('email_porteur'));

            // tell Doctrine you want to (eventually) save the Product (no queries yet)
            $entityManager->persist($fav);
        }
        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();
        unset($_SESSION['favoris']);

        // Retour sur la vue précédente
        $route = $request->headers->get('referer');
        return $this->redirect($route);
    }
}