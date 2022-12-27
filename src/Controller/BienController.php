<?php

namespace App\Controller;

use App\Entity\BienImmobilier;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class BienController extends AbstractController{

    public function createBien(ManagerRegistry $doctrine, Request $request): Response
    {
        
        $entityManager = $doctrine->getManager();
        //dd($request->query->get('titre')); // test

        $bien = new BienImmobilier();
        $bien->setTitre($request->query->get('titre'));
        $bien->setPrix($request->query->get('prix'));
        $bien->setDescription($request->query->get('description'));
        $bien->setville($request->query->get('ville'));
        $bien->setCodePostal($request->query->get('code_postal'));
        $bien->setSurface($request->query->get('surface'));

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($bien);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response('Saved new bien with id '.$bien->getId());
    }

    public function updateBien(ManagerRegistry $doctrine, int $id, Request $request): Response
    {
       
        $entityManager = $doctrine->getManager();
        $bien = $entityManager->getRepository(BienImmobilier::class)->find($id);


        if (!$bien) {
            throw $this->createNotFoundException(
                'No bien found for id '.$id
            );
        }
        $titre = $request->query->get('titre');
        $prix = $request->query->get('prix');
        $description = $request->query->get('description');
        $ville = $request->query->get('ville');
        $codePostal = $request->query->get('code_postal');
        $surface = $request->query->get('surface');

        if( $titre != null && $titre != $bien->getTitre()) $bien->setTitre($titre);
        if( $prix != null && $prix != $bien->getPrix()) $bien->setPrix($prix);
        if( $description != null && $description != $bien->getDescription()) $bien->setDescription($description);
        if( $ville != null && $ville != $bien->getville()) $bien->setville($ville);
        if($codePostal != null && $codePostal != $bien->getCodePostal()) $bien->setCodePostal($codePostal);
        if( $surface != null && $surface != $bien->getSurface()) $bien->setSurface($surface);

        $entityManager->flush();

        // return $this->redirectToRoute('bien_update', [
        //     'id' => $bien->getId()
        // ]);
        return new Response('Modifications enregistrées');
    }

    public function removeBien(ManagerRegistry $doctrine, int $id): Response
    {
        $entityManager = $doctrine->getManager();
        $bien = $entityManager->getRepository(BienImmobilier::class)->find($id);

        if (!$bien) {
            throw $this->createNotFoundException(
                'No bien found for id '.$id
            );
        }

        $entityManager->remove($bien);
        $entityManager->flush();

        // return $this->redirectToRoute('bien_show', [
        //     'id' => $bien->getId()
        // ]);
        return new Response('Bien sypprimé');
    }

    
}


?>