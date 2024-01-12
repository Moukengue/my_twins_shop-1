<?php

namespace App\Entity;

use App\Repository\FactureRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FactureRepository::class)]
class Facture
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $adresse = null;

    #[ORM\Column(length: 50)]
    private ?string $modePaiement = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateEmission = null;

    #[ORM\Column]
    private ?int $tva = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 9, scale: 2)]
    private ?string $montantTtc = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $reglement = null;

    #[ORM\Column(length: 50)]
    private ?string $dateLimitePaiement = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): static
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getModePaiement(): ?string
    {
        return $this->modePaiement;
    }

    public function setModePaiement(string $modePaiement): static
    {
        $this->modePaiement = $modePaiement;

        return $this;
    }

    public function getDateEmission(): ?\DateTimeInterface
    {
        return $this->dateEmission;
    }

    public function setDateEmission(\DateTimeInterface $dateEmission): static
    {
        $this->dateEmission = $dateEmission;

        return $this;
    }

    public function getTva(): ?int
    {
        return $this->tva;
    }

    public function setTva(int $tva): static
    {
        $this->tva = $tva;

        return $this;
    }

    public function getMontantTtc(): ?string
    {
        return $this->montantTtc;
    }

    public function setMontantTtc(string $montantTtc): static
    {
        $this->montantTtc = $montantTtc;

        return $this;
    }

    public function getReglement(): ?int
    {
        return $this->reglement;
    }

    public function setReglement(int $reglement): static
    {
        $this->reglement = $reglement;

        return $this;
    }

    public function getDateLimitePaiement(): ?string
    {
        return $this->dateLimitePaiement;
    }

    public function setDateLimitePaiement(string $dateLimitePaiement): static
    {
        $this->dateLimitePaiement = $dateLimitePaiement;

        return $this;
    }
}
