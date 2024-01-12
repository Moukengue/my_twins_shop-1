<?php

namespace App\Entity;

use App\Repository\LivraisonRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LivraisonRepository::class)]
class Livraison
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $numBon = null;

    #[ORM\Column(length: 50)]
    private ?string $adresse = null;

    #[ORM\OneToMany(mappedBy: 'livraison', targetEntity: contient::class)]
    private Collection $contient;

    #[ORM\ManyToOne(inversedBy: 'livraisons')]
    private ?commande $commande = null;

    public function __construct()
    {
        $this->contient = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumBon(): ?string
    {
        return $this->numBon;
    }

    public function setNumBon(string $numBon): static
    {
        $this->numBon = $numBon;

        return $this;
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

    /**
     * @return Collection<int, contient>
     */
    public function getContient(): Collection
    {
        return $this->contient;
    }

    public function addContient(contient $contient): static
    {
        if (!$this->contient->contains($contient)) {
            $this->contient->add($contient);
            $contient->setLivraison($this);
        }

        return $this;
    }

    public function removeContient(contient $contient): static
    {
        if ($this->contient->removeElement($contient)) {
            // set the owning side to null (unless already changed)
            if ($contient->getLivraison() === $this) {
                $contient->setLivraison(null);
            }
        }

        return $this;
    }

    public function getCommande(): ?commande
    {
        return $this->commande;
    }

    public function setCommande(?commande $commande): static
    {
        $this->commande = $commande;

        return $this;
    }
}
