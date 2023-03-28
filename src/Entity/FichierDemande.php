<?php

namespace App\Entity;

use App\Repository\FichierDemandeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FichierDemandeRepository::class)]
class FichierDemande
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom_fichier = null;

    #[ORM\ManyToOne(inversedBy: 'fichierDemandes')]
    private ?User $id_user = null;

    #[ORM\OneToMany(mappedBy: 'id_fichier_demande', targetEntity: Fichiers::class)]
    private Collection $fichierClients;

    public function __construct()
    {
        $this->fichierClients = new ArrayCollection();
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
     * @return Collection<int, Fichiers>
     */
    public function getFichierClients(): Collection
    {
        return $this->fichierClients;
    }

    public function addFichierClient(Fichiers $fichierClient): self
    {
        if (!$this->fichierClients->contains($fichierClient)) {
            $this->fichierClients->add($fichierClient);
            $fichierClient->setIdFichierDemande($this);
        }

        return $this;
    }

    public function removeFichierClient(Fichiers $fichierClient): self
    {
        if ($this->fichierClients->removeElement($fichierClient)) {
            // set the owning side to null (unless already changed)
            if ($fichierClient->getIdFichierDemande() === $this) {
                $fichierClient->setIdFichierDemande(null);
            }
        }

        return $this;
    }
}
