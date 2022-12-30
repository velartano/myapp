<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CategorieRepository;
use Symfony\Component\Form\Extension\Core\Type\SearchType;
use App\Repository\BienImmobilierRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use App\Entity\BienImmobilier;
use App\Form\Type\BienType;

class CategoriesController extends AbstractController
{
    /**
     * @Route("/categories/{id}", name="app_categories")
     */
    public function index(
        CategorieRepository $categorieRepository,
        int $id,
        BienImmobilierRepository $bienImmobilierRepository,
        ManagerRegistry $doctrine,
        Request $request
    ): Response {

        $form = $this->createForm(BienType::class, [
            'attr' => [
                'class' =>
                    'form-find d-lg-flex justify-content-between p-4 bg-grey borderall mb-4',
            ],
        ]);
        $form
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
        $biens = $id != 0 ? $bienImmobilierRepository->findByCat($id) : $bienImmobilierRepository->findAll();
        // Traitement de la recherche
            $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $searchData = $form->getData();
            $searchData['cat_id'] = $id;
            $biens = $bienImmobilierRepository->search($searchData);
        }

        return $this->render('categories/index.html.twig', [
            'controller_name' => 'CategoriesController',
            'categories' => $categorieRepository->findAll(),
            'form' => $form->createView(),
            'biens' => $biens,
            'selectedBienId' => $id,
        ]);
    }
}