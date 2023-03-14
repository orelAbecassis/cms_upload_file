<?php

namespace App\Entity;

use App\Repository\FichierClientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FichierClientRepository::class)]
class FichierClient
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom_fichier = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date_fichier = null;

    #[ORM\Column(length: 255)]
    private ?string $path = null;

    #[ORM\ManyToOne(inversedBy: 'fichierClients')]
    private ?FichierDemande $id_fichier_demande = null;

    #[ORM\ManyToMany(targetEntity: InfoClient::class, inversedBy: 'fichierClients')]
    private Collection $id_info;

    public function __construct()
    {
        $this->id_info = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomFichier(): ?string
    {
        return $this->nom_fichier;
    }

    public function setNomFichier(string $nom_fichier): self
    {
        $this->nom_fichier = $nom_fichier;

        return $this;
    }

    public function getDateFichier(): ?\DateTimeInterface
    {
        return $this->date_fichier;
    }

    public function setDateFichier(\DateTimeInterface $date_fichier): self
    {
        $this->date_fichier = $date_fichier;

        return $this;
    }

    public function getPath(): ?string
    {
        return $this->path;
    }

    public function setPath(string $path): self
    {
        $this->path = $path;

        return $this;
    }

    public function getIdFichierDemande(): ?FichierDemande
    {
        return $this->id_fichier_demande;
    }

    public function setIdFichierDemande(?FichierDemande $id_fichier_demande): self
    {
        $this->id_fichier_demande = $id_fichier_demande;

        return $this;
    }

    /**
     * @return Collection<int, InfoClient>
     */
    public function getIdInfo(): Collection
    {
        return $this->id_info;
    }

    public function addIdInfo(InfoClient $idInfo): self
    {
        if (!$this->id_info->contains($idInfo)) {
            $this->id_info->add($idInfo);
        }

        return $this;
    }

    public function removeIdInfo(InfoClient $idInfo): self
    {
        $this->id_info->removeElement($idInfo);

        return $this;
    }
}
