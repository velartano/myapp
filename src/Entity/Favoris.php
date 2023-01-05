<?php

namespace App\Entity;

use App\Repository\FavorisRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FavorisRepository::class)
 */
class Favoris
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\Column(type="integer")
     */
    private $id_bien;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email_porteur;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getIdBien(): ?int
    {
        return $this->id_bien;
    }

    public function setIdBien(int $id_bien): self
    {
        $this->id_bien = $id_bien;

        return $this;
    }

    public function getEmailPorteur(): ?string
    {
        return $this->email_porteur;
    }

    public function setEmailPorteur(string $email_porteur): self
    {
        $this->email_porteur = $email_porteur;

        return $this;
    }
}
