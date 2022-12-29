<?php

namespace App\Controller\Admin;

use App\Entity\BienImmobilier;
use App\Entity\Categorie;
use App\Entity\Contact;
use App\Entity\Message;
use App\Repository\ContactRepository;
use App\Repository\MessageRepository;
use App\Repository\CategorieRepository;
use App\Repository\BienImmobilierRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    public function  __construct(
        BienImmobilierRepository $bienImmobilierRepository,
        CategorieRepository $CategorieRepository,
        ContactRepository $contactRepository,
        MessageRepository $messageRepository
    ) {
        $this->BienImmobilierRepository = $bienImmobilierRepository;
        $this->CategorieRepository = $CategorieRepository;
        $this->ContactRepository = $contactRepository;
        $this->MessageRepository = $messageRepository;
    }
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return $this->render('Bundles/EasyAdminBundles/welcome.html.twig', [
            'countContact' => $this->ContactRepository->countAllContact(),
            'countBien' => $this->BienImmobilierRepository->countAllBien(),
            'countCategorie' => $this->CategorieRepository->countBycategorie(),
            'message' => $this->MessageRepository->countByMessage()
        ]);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('L3miage');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Bien', 'fas fa-laptop-house', BienImmobilier::class);
        yield MenuItem::linkToCrud('categorie',  'fas fa-folder', Categorie::class);
        yield MenuItem::linkToCrud('Contact', 'fas fa-address-book', Contact::class);
        yield MenuItem::linkToCrud('message', 'fas fa-address-book', Message::class);
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
    }
}