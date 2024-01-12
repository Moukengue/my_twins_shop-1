<?php

namespace App\Entity;

use App\Repository\CommercialRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommercialRepository::class)]
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

    #[ORM\OneToMany(mappedBy: 'commercial', targetEntity: Client::class)]
    private Collection $clients;

    public function __construct()
    {
        $this->clients = new ArrayCollection();
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
     * @return Collection<int, Client>
     */
    public function getClients(): Collection
    {
        return $this->clients;
    }

    public function addClient(Client $client): static
    {
        if (!$this->clients->contains($client)) {
            $this->clients->add($client);
            $client->setCommercial($this);
        }

        return $this;
    }

    public function removeClient(Client $client): static
    {
        if ($this->clients->removeElement($client)) {
            // set the owning side to null (unless already changed)
            if ($client->getCommercial() === $this) {
                $client->setCommercial(null);
            }
        }

        return $this;
    }
}
