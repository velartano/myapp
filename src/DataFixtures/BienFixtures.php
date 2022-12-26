<?php

namespace App\DataFixtures;

use App\Entity\BienImmobilier;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class BienFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 1; $i <= 10; $i++) {
            $bien = new BienImmobilier();
            $bien->setTitre("titre du bien $i")
                ->setDescription("<p>Contenu du bien $i</p>")
                ->setImage("http://placehold.it/800x534")
                ->setCategorie("terrain agricole")
                ->setLocalisation("35000")
                ->setPrix(60000)
                ->setSurface("54m2")
                ->setCodePostal(35000)
                ->setUrl("bien.com $i");


            $manager->persist($bien);
        }

        $manager->flush();
    }
}
