<?php

namespace App\Controller;

use App\Entity\BienImmobilier;
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


class BienController extends AbstractController
{
    /**
     * @Route("/bien", name="app_bien")
     */
    public function index(ManagerRegistry $doctrine,Request $request): Response
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
}