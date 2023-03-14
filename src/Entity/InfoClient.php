<?php

namespace App\Entity;

use App\Repository\InfoClientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InfoClientRepository::class)]
class InfoClient
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom = null;

    #[ORM\Column(length: 255)]
    private ?string $mailPro = null;

    #[ORM\Column(length: 255)]
    private ?string $nom_societe = null;

    #[ORM\Column(length: 255)]
    private ?string $adresse = null;

    #[ORM\Column]
    private ?int $num_pro = null;

    #[ORM\Column]
    private ?int $cp = null;

    #[ORM\Column(length: 255)]
    private ?string $ville = null;

    #[ORM\Column]
    private ?int $num_siret = null;

    #[ORM\ManyToOne(inversedBy: 'infoClients')]
    private ?User $id_user = null;

    #[ORM\ManyToMany(targetEntity: FichierClient::class, mappedBy: 'id_info')]
    private Collection $fichierClients;

    public function __construct()
    {
        $this->fichierClients = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getMailPro(): ?string
    {
        return $this->mailPro;
    }

    public function setMailPro(string $mailPro): self
    {
        $this->mailPro = $mailPro;

        return $this;
    }

    public function getNomSociete(): ?string
    {
        return $this->nom_societe;
    }

    public function setNomSociete(string $nom_societe): self
    {
        $this->nom_societe = $nom_societe;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getNumPro(): ?int
    {
        return $this->num_pro;
    }

    public function setNumPro(int $num_pro): self
    {
        $this->num_pro = $num_pro;

        return $this;
    }

    public function getCp(): ?int
    {
        return $this->cp;
    }

    public function setCp(int $cp): self
    {
        $this->cp = $cp;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getNumSiret(): ?int
    {
        return $this->num_siret;
    }

    public function setNumSiret(int $num_siret): self
    {
        $this->num_siret = $num_siret;

        return $this;
    }

    public function getIdUser(): ?User
    {
        return $this->id_user;
    }

    public function setIdUser(?User $id_user): self
    {
        $this->id_user = $id_user;

        return $this;
    }

    /**
     * @return Collection<int, FichierClient>
     */
    public function getFichierClients(): Collection
    {
        return $this->fichierClients;
    }

    public function addFichierClient(FichierClient $fichierClient): self
    {
        if (!$this->fichierClients->contains($fichierClient)) {
            $this->fichierClients->add($fichierClient);
            $fichierClient->addIdInfo($this);
        }

        return $this;
    }

    public function removeFichierClient(FichierClient $fichierClient): self
    {
        if ($this->fichierClients->removeElement($fichierClient)) {
            $fichierClient->removeIdInfo($this);
        }

        return $this;
    }
}
