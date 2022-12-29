<?php

namespace App\Entity;

use App\Repository\CategorieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    /**
     * @ORM\OneToMany(targetEntity=BienImmobilier::class, mappedBy="categorie")
     */
    private $bienImmobiliers;

    public function __construct()
    {
        $this->bienImmobiliers = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, BienImmobilier>
     */
    public function getBienImmobiliers(): Collection
    {
        return $this->bienImmobiliers;
    }

    public function addBienImmobilier(BienImmobilier $bienImmobilier): self
    {
        if (!$this->bienImmobiliers->contains($bienImmobilier)) {
            $this->bienImmobiliers[] = $bienImmobilier;
            $bienImmobilier->setCategorie($this);
        }

        return $this;
    }

    public function removeBienImmobilier(BienImmobilier $bienImmobilier): self
    {
        if ($this->bienImmobiliers->removeElement($bienImmobilier)) {
            // set the owning side to null (unless already changed)
            if ($bienImmobilier->getCategorie() === $this) {
                $bienImmobilier->setCategorie(null);
            }
        }

        return $this;
    }
}
