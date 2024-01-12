<?php

namespace App\Entity;

use App\Repository\ClientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClientRepository::class)]
class Client
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $cliNom = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $cliPrenom = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $cliAdresseFacturation = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $cliAdresseLivraison = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $cliVille = null;

    #[ORM\Column(length: 11, nullable: true)]
    private ?string $cliCp = null;

    #[ORM\Column(length: 50)]
    private ?string $cliRef = null;

    #[ORM\Column(nullable: true)]
    private ?int $cliType = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $cliMail = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $cliFone = null;

    #[ORM\Column(length: 14, nullable: true)]
    private ?string $cliSiret = null;

    #[ORM\Column(length: 10, nullable: true)]
    private ?string $cliCoef = null;

    #[ORM\ManyToOne(inversedBy: 'clients')]
    private ?Commercial $commercial = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $nom = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $prenom = null;

    #[ORM\Column(length: 50)]
    private ?string $adresseFacturation = null;

    #[ORM\Column(length: 50)]
    private ?string $adresseLivraison = null;

    #[ORM\Column(length: 50)]
    private ?string $ville = null;

    #[ORM\Column]
    private ?int $cp = null;

    #[ORM\Column(length: 50)]
    private ?string $ref = null;

    #[ORM\Column(length: 11)]
    private ?string $type = null;

    #[ORM\Column(length: 50)]
    private ?string $mail = null;

    #[ORM\Column(length: 50)]
    private ?string $fone = null;

    #[ORM\Column(length: 14)]
    private ?string $siret = null;

    #[ORM\Column(length: 50)]
    private ?string $coef = null;

    #[ORM\OneToMany(mappedBy: 'client', targetEntity: Commande::class)]
    private Collection $commandes;

    public function __construct()
    {
        $this->commandes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCliNom(): ?string
    {
        return $this->cliNom;
    }

    public function setCliNom(string $cliNom): static
    {
        $this->cliNom = $cliNom;

        return $this;
    }

    public function getCliPrenom(): ?string
    {
        return $this->cliPrenom;
    }

    public function setCliPrenom(?string $cliPrenom): static
    {
        $this->cliPrenom = $cliPrenom;

        return $this;
    }

    public function getCliAdresseFacturation(): ?string
    {
        return $this->cliAdresseFacturation;
    }

    public function setCliAdresseFacturation(?string $cliAdresseFacturation): static
    {
        $this->cliAdresseFacturation = $cliAdresseFacturation;

        return $this;
    }

    public function getCliAdresseLivraison(): ?string
    {
        return $this->cliAdresseLivraison;
    }

    public function setCliAdresseLivraison(?string $cliAdresseLivraison): static
    {
        $this->cliAdresseLivraison = $cliAdresseLivraison;

        return $this;
    }

    public function getCliVille(): ?string
    {
        return $this->cliVille;
    }

    public function setCliVille(?string $cliVille): static
    {
        $this->cliVille = $cliVille;

        return $this;
    }

    public function getCliCp(): ?string
    {
        return $this->cliCp;
    }

    public function setCliCp(?string $cliCp): static
    {
        $this->cliCp = $cliCp;

        return $this;
    }

    public function getCliRef(): ?string
    {
        return $this->cliRef;
    }

    public function setCliRef(string $cliRef): static
    {
        $this->cliRef = $cliRef;

        return $this;
    }

    public function getCliType(): ?int
    {
        return $this->cliType;
    }

    public function setCliType(?int $cliType): static
    {
        $this->cliType = $cliType;

        return $this;
    }

    public function getCliMail(): ?string
    {
        return $this->cliMail;
    }

    public function setCliMail(?string $cliMail): static
    {
        $this->cliMail = $cliMail;

        return $this;
    }

    public function getCliFone(): ?string
    {
        return $this->cliFone;
    }

    public function setCliFone(?string $cliFone): static
    {
        $this->cliFone = $cliFone;

        return $this;
    }

    public function getCliSiret(): ?string
    {
        return $this->cliSiret;
    }

    public function setCliSiret(?string $cliSiret): static
    {
        $this->cliSiret = $cliSiret;

        return $this;
    }

    public function getCliCoef(): ?string
    {
        return $this->cliCoef;
    }

    public function setCliCoef(?string $cliCoef): static
    {
        $this->cliCoef = $cliCoef;

        return $this;
    }

    public function getCommercial(): ?Commercial
    {
        return $this->commercial;
    }

    public function setCommercial(?Commercial $commercial): static
    {
        $this->commercial = $commercial;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(?string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getAdresseFacturation(): ?string
    {
        return $this->adresseFacturation;
    }

    public function setAdresseFacturation(string $adresseFacturation): static
    {
        $this->adresseFacturation = $adresseFacturation;

        return $this;
    }

    public function getAdresseLivraison(): ?string
    {
        return $this->adresseLivraison;
    }

    public function setAdresseLivraison(string $adresseLivraison): static
    {
        $this->adresseLivraison = $adresseLivraison;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): static
    {
        $this->ville = $ville;

        return $this;
    }

    public function getCp(): ?int
    {
        return $this->cp;
    }

    public function setCp(int $cp): static
    {
        $this->cp = $cp;

        return $this;
    }

    public function getRef(): ?string
    {
        return $this->ref;
    }

    public function setRef(string $ref): static
    {
        $this->ref = $ref;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): static
    {
        $this->mail = $mail;

        return $this;
    }

    public function getFone(): ?string
    {
        return $this->fone;
    }

    public function setFone(string $fone): static
    {
        $this->fone = $fone;

        return $this;
    }

    public function getSiret(): ?string
    {
        return $this->siret;
    }

    public function setSiret(string $siret): static
    {
        $this->siret = $siret;

        return $this;
    }

    public function getCoef(): ?string
    {
        return $this->coef;
    }

    public function setCoef(string $coef): static
    {
        $this->coef = $coef;

        return $this;
    }

    /**
     * @return Collection<int, Commande>
     */
    public function getCommandes(): Collection
    {
        return $this->commandes;
    }

    public function addCommande(Commande $commande): static
    {
        if (!$this->commandes->contains($commande)) {
            $this->commandes->add($commande);
            $commande->setClient($this);
        }

        return $this;
    }

    public function removeCommande(Commande $commande): static
    {
        if ($this->commandes->removeElement($commande)) {
            // set the owning side to null (unless already changed)
            if ($commande->getClient() === $this) {
                $commande->setClient(null);
            }
        }

        return $this;
    }
}
