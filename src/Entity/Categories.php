<?php

namespace App\Entity;

use App\Repository\CategoriesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategoriesRepository::class)
 */
class Categories
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
     * @ORM\OneToMany(targetEntity=Bien::class, mappedBy="bien")
     */
    private $biens;

    /**
     * @ORM\OneToMany(targetEntity=bien::class, mappedBy="categories")
     */
    private $bien;

    public function __construct()
    {
        $this->biens = new ArrayCollection();
        $this->bien = new ArrayCollection();
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
     * @return Collection<int, Bien>
     */
    public function getBiens(): Collection
    {
        return $this->biens;
    }

    public function addbiens(Bien $bien): self
    {
        if (!$this->Bien->contains($bien)) {
            $this->Bien[] = $bien;
            $bien->setBiens($this);
        }

        return $this;
    }

    public function removebiens(Bien $bien): self
    {
        if ($this->Bien->removeElement($bien)) {
            // set the owning side to null (unless already changed)
            if ($bien->getBiens() === $this) {
                $bien->setBiens(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, bien>
     */
    public function getBien(): Collection
    {
        return $this->bien;
    }

    public function addBien(bien $bien): self
    {
        if (!$this->bien->contains($bien)) {
            $this->bien[] = $bien;
            $bien->setCategories($this);
        }

        return $this;
    }

    public function removeBien(bien $bien): self
    {
        if ($this->bien->removeElement($bien)) {
            // set the owning side to null (unless already changed)
            if ($bien->getCategories() === $this) {
                $bien->setCategories(null);
            }
        }

        return $this;
    }
}
