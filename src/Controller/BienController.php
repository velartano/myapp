<?php

namespace App\Controller;

use App\Entity\BienImmobilier;
use App\Entity\Favoris;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Form\Type\BienType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
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
        $session = $request->getSession(); // On récupère la session de l'utilisateur
        
        if (empty($session->get('favoris'))) { // S'il ny'a aucun favori on ajoute un 1er
            $session->set('favoris', $id);
        } else { // S'il y'avait déjà des favoris
            $favoris = explode(";", $session->get('favoris')); // On récupère tous les favoris de la session en cours
            if (in_array($id, $favoris)) { // Retirer des favoris
                unset($favoris[array_search($id . "", $favoris)]);
                $session->set('favoris', implode(";", $favoris));
            } else { // Ajouter aux favoris
                $anciensFavs = $session->get('favoris');
                $session->set('favoris', $anciensFavs . ";" . $id);
            }
        }

        // Retour sur la vue précédente
        $route = $request->headers->get('referer'); // Route de la vue précedente
        return $this->redirect($route);
    }
    /**
     * @Route("/bien/sendFavoris", name="app_bien_send_favs")
     */
    public function sendFavorisInMail(ManagerRegistry $doctrine, Request $request, BienImmobilierRepository $bienImmobilierRepository, MailerInterface $mailer): Response
    {
        $entityManager = $doctrine->getManager();
        $session = $request->getSession(); // On récupère la session de l'utilisateur

        $email_porteur = $request->request->get("email_porteur");
        // dd($session->get('favoris'));
        $favoris = explode(";", $session->get('favoris')); // On récupère tous les favoris de la session en cours
        $email_content = "<h3>Liste de vos favoris</h3>";
        $email_content .= "<ul>";
        
        if ($email_porteur != null) {
            foreach ($favoris as $id_fav){
                $fav = new Favoris();
                $fav->setDate(new \DateTime());
                $fav->setIdBien((int) $id_fav);
                $fav->setEmailPorteur($email_porteur);

                $bien = $bienImmobilierRepository->find(intval($id_fav));
                $email_content .= "<li>" . $bien->getTitre() . "</li>";
    
                // tell Doctrine you want to (eventually) save the Product (no queries yet)
                $entityManager->persist($fav);
            }
            // actually executes the queries (i.e. the INSERT query)
            $entityManager->flush();
            $session->clear();
            $email_content .= "</ul>";

            // Envoi du mail
            $email = (new Email())
                ->from('admin@safer-project.com')
                ->to($email_porteur)
                //->cc('cc@example.com')
                //->bcc('bcc@example.com')
                //->replyTo('fabien@example.com')
                //->priority(Email::PRIORITY_HIGH)
                ->subject('Ajout des favoris')
                // ->text("Vous venez d'ajouter de nouveaux favoris !")
                ->html($email_content);

            $mailer->send($email);
        }
        
        // Retour sur la vue précédente
        $route = $request->headers->get('referer');
        return $this->redirect($route);
    }
}