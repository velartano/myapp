<?php

namespace App\Controller;

use App\Entity\Contact;
use Doctrine\ORM\EntityManager;
use Doctrine\Persistence\ObjectManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="app_contact")
     */
    public function index(Request $request, ManagerRegistry $manager): Response
    {

        $entityManager = $manager->getManager();

        $Contact = new Contact();  //creation d'un objet

        $form = $this->createFormBuilder($Contact) //  creation d'un formulaire 
            ->add('nom')
            ->add('prenom')
            ->add('mail', EmailType::class)
            ->add('numero', NumberType::class)
            ->add('content', TextareaType::class)
            // ->add('save', SubmitType::class, ['label' => 'Enregistrer'])
            ->getForm();

        $form->handleRequest($request); //essaie d'annalyser la requete htpp que je passe en parametre, c'est a dire est-ce que les données entrées sont conforme avec celles de la base de données

        //dump($Contact);
        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager->persist($Contact, true);
            $entityManager->flush();

            return $this->redirectToRoute('app_contact');
        }
        dump($Contact);

        return $this->render('contact/index.html.twig', [
            'controller_name' => 'ContactController',
            'formcontact' => $form->createView()
        ]);
    }
}
