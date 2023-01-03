<?php

namespace App\Controller\Admin;

use App\Entity\BienImmobilier;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;
use Vich\UploaderBundle\Form\Type\VichImageType;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;

use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class BienImmobilierCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return BienImmobilier::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IntegerField::new('id')->onlyOnIndex(),
            TextField::new('titre'),
            IntegerField::new('prix'),
            IntegerField::new('code_postal'),
            TextEditorField::new('description'),
            TextField::new('localisation'),
            TextField::new('surface'),
            // TextField::new('imageFile')->setFormType(VichImageType::class)->onlyWhenCreating(),
            ImageField::new('image')->setUploadDir('public/Uploads/images')->setBasePath('/uploads/images'),
            TextField::new('status'),
            AssociationField::new('categorie'),
        ];
    }
}
