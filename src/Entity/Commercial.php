<?php

namespace App\Entity;
use ApiPlatform\Metadata\ApiResource;
use App\Repository\CommercialRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommercialRepository::class)]
#[ApiResource()]
class Commercial
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $commercialNom = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $commercialPrenom = null;

    #[ORM\Column(nullable: true)]
    private ?int $commercialType = null;

    #[ORM\Column(length: 15, nullable: true)]
    private ?string $commercialTel = null;

    #[ORM\OneToMany(mappedBy: 'commercial', targetEntity: Utilisateur::class)]
    private Collection $utilisateurs;


    public function __construct()
    {
        $this->utilisateurs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCommercialNom(): ?string
    {
        return $this->commercialNom;
    }

    public function setCommercialNom(?string $commercialNom): static
    {
        $this->commercialNom = $commercialNom;

        return $this;
    }

    public function getCommercialPrenom(): ?string
    {
        return $this->commercialPrenom;
    }

    public function setCommercialPrenom(?string $commercialPrenom): static
    {
        $this->commercialPrenom = $commercialPrenom;

        return $this;
    }

    public function getCommercialType(): ?int
    {
        return $this->commercialType;
    }

    public function setCommercialType(?int $commercialType): static
    {
        $this->commercialType = $commercialType;

        return $this;
    }

    public function getCommercialTel(): ?string
    {
        return $this->commercialTel;
    }

    public function setCommercialTel(?string $commercialTel): static
    {
        $this->commercialTel = $commercialTel;

        return $this;
    }

    /**
     * @return Collection<int, Utilisateur>
     */
    public function getUtilisateurs(): Collection
    {
        return $this->utilisateurs;
    }

    public function addUtilisateur(Utilisateur $utilisateur): static
    {
        if (!$this->utilisateurs->contains($utilisateur)) {
            $this->utilisateurs->add($utilisateur);
            $utilisateur->setCommercial($this);
        }

        return $this;
    }

    public function removeUtilisateur(Utilisateur $utilisateur): static
    {
        if ($this->utilisateurs->removeElement($utilisateur)) {
            // set the owning side to null (unless already changed)
            if ($utilisateur->getCommercial() === $this) {
                $utilisateur->setCommercial(null);
            }
        }

        return $this;
    }

   
}
