<?php

namespace App\Controller;

use App\Entity\Safer;
use App\Repository\BienImmobilierRepository;
use App\Repository\CategorieRepository;
use App\Repository\SaferRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SearchType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Form\Type\BienType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;

class AfficherBienController extends AbstractController
{
    /**
     * @Route("/afficher/bien", name="app_afficher_bien")
     */
    public function index(CategorieRepository $categorieRepository,
  
    BienImmobilierRepository $bienImmobilierRepository, Request $request): Response
    {
        $form = $this->createForm(BienType::class, [
            'attr' => [
                'class' =>
                    'form-find d-lg-flex justify-content-between p-4 bg-grey borderall mb-4',
            ],
        ]);
        $categories = $categorieRepository->findAll();
        $tabCat = ['Toutes categories' => null];
        foreach ($categories as $cat)
                $tabCat[$cat->getTypeCat()] = $cat->getId();
                
        // dd($tabCat);
        $form
        ->add('categorie', ChoiceType::class, [
            'required' => false,
            'choices' => $tabCat,
            'attr' => ['class' => 'niceSelect'],
        ])
        ->add('titre', SearchType::class, [
            'required' => false,
            'attr' => ['class' => 'nice-select niceSelect'],
            'attr' => ['placeholder' => 'Nom du bien'],
        ])
            ->add('prix', IntegerType::class, [
                'required' => false,
                'attr' => ['class' => 'nice-select niceSelect'],
                'attr' => ['placeholder' => 'Prix max'],
            ])

            ->add('surface', IntegerType::class, [
                'required' => false,
                'attr' => ['class' => 'nice-select niceSelect'],
                'attr' => ['placeholder' => 'Surface m2'],
            ])
            ->add('ville', TextType::class, [
                'required' => false,
                'attr' => ['class' => 'nice-select niceSelect'],
                'attr' => ['placeholder' => 'Ville'],
            ])
            ->add('Rechercher', SubmitType::class);

            
            // Récupération des données
        $biens = $bienImmobilierRepository->findAll();
        // Traitement de la recherche
            $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $searchData = $form->getData();
            $searchData['cat_id'] = $searchData['categorie'];
            // dd($searchData);
            $biens = $bienImmobilierRepository->search($searchData);
        }
        
        $session = $request->getSession(); // On récupère la session de l'utilisateur
        $favoris = explode(";", $session->get('favoris')); // On récupère tous les favoris de la session en cours
        
        return $this->render('afficher_bien/index.html.twig', [
            'controller_name' => 'AfficherBienController',
            'bienImmob' => $biens,
            'categories' => $categories,
            'form' => $form->createView(),
            'selectedBienId' => 0,
            'favoris' => $favoris,
        ]);
    }
}