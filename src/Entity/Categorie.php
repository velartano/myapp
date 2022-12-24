<?php

namespace App\Entity;

use App\Repository\CategorieRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategorieRepository::class)
 */
class Categorie
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type_cat;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypeCat(): ?string
    {
        return $this->type_cat;
    }

    public function setTypeCat(string $type_cat): self
    {
        $this->type_cat = $type_cat;

        return $this;
    }
}
