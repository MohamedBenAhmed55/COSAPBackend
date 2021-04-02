<?php

namespace App\Entity;

use App\Repository\CompanyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ORM\Entity(repositoryClass=CompanyRepository::class)
 */
#[ApiResource]
class Company
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
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $city;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $postalcode;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $logo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $matricule_fiscale;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $secteur_activite;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $phone;

    /**
     * @ORM\OneToMany(targetEntity=JoursFeries::class, mappedBy="company")
     */
    private $joursFeries;

    /**
     * @ORM\OneToMany(targetEntity=HeuresTravail::class, mappedBy="company")
     */
    private $heuresTravails;

    /**
     * @ORM\OneToMany(targetEntity=ChefGroupe::class, mappedBy="company")
     */
    private $chefGroupes;

    /**
     * @ORM\OneToMany(targetEntity=Groupe::class, mappedBy="company")
     */
    private $groupes;

    /**
     * @ORM\OneToMany(targetEntity=Salle::class, mappedBy="company")
     */
    private $salles;

    /**
     * @ORM\OneToMany(targetEntity=Poste::class, mappedBy="company")
     */
    private $postes;

    /**
     * @ORM\OneToMany(targetEntity=User::class, mappedBy="company")
     */
    private $users;

    /**
     * @ORM\OneToMany(targetEntity=Autorisation::class, mappedBy="company")
     */
    private $autorisations;

    /**
     * @ORM\OneToMany(targetEntity=Conge::class, mappedBy="company")
     */
    private $conges;

    /**
     * @ORM\OneToMany(targetEntity=Tache::class, mappedBy="company")
     */
    private $taches;

    public function __construct()
    {
        $this->joursFeries = new ArrayCollection();
        $this->heuresTravails = new ArrayCollection();
        $this->chefGroupes = new ArrayCollection();
        $this->groupes = new ArrayCollection();
        $this->salles = new ArrayCollection();
        $this->postes = new ArrayCollection();
        $this->users = new ArrayCollection();
        $this->autorisations = new ArrayCollection();
        $this->conges = new ArrayCollection();
        $this->taches = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getPostalcode(): ?string
    {
        return $this->postalcode;
    }

    public function setPostalcode(string $postalcode): self
    {
        $this->postalcode = $postalcode;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getLogo(): ?string
    {
        return $this->logo;
    }

    public function setLogo(string $logo): self
    {
        $this->logo = $logo;

        return $this;
    }

    public function getMatriculeFiscale(): ?string
    {
        return $this->matricule_fiscale;
    }

    public function setMatriculeFiscale(string $matricule_fiscale): self
    {
        $this->matricule_fiscale = $matricule_fiscale;

        return $this;
    }

    public function getSecteurActivite(): ?string
    {
        return $this->secteur_activite;
    }

    public function setSecteurActivite(string $secteur_activite): self
    {
        $this->secteur_activite = $secteur_activite;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * @return Collection|JoursFeries[]
     */
    public function getJoursFeries(): Collection
    {
        return $this->joursFeries;
    }

    public function addJoursFery(JoursFeries $joursFery): self
    {
        if (!$this->joursFeries->contains($joursFery)) {
            $this->joursFeries[] = $joursFery;
            $joursFery->setCompany($this);
        }

        return $this;
    }

    public function removeJoursFery(JoursFeries $joursFery): self
    {
        if ($this->joursFeries->removeElement($joursFery)) {
            // set the owning side to null (unless already changed)
            if ($joursFery->getCompany() === $this) {
                $joursFery->setCompany(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|HeuresTravail[]
     */
    public function getHeuresTravails(): Collection
    {
        return $this->heuresTravails;
    }

    public function addHeuresTravail(HeuresTravail $heuresTravail): self
    {
        if (!$this->heuresTravails->contains($heuresTravail)) {
            $this->heuresTravails[] = $heuresTravail;
            $heuresTravail->setCompany($this);
        }

        return $this;
    }

    public function removeHeuresTravail(HeuresTravail $heuresTravail): self
    {
        if ($this->heuresTravails->removeElement($heuresTravail)) {
            // set the owning side to null (unless already changed)
            if ($heuresTravail->getCompany() === $this) {
                $heuresTravail->setCompany(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|ChefGroupe[]
     */
    public function getChefGroupes(): Collection
    {
        return $this->chefGroupes;
    }

    public function addChefGroupe(ChefGroupe $chefGroupe): self
    {
        if (!$this->chefGroupes->contains($chefGroupe)) {
            $this->chefGroupes[] = $chefGroupe;
            $chefGroupe->setCompany($this);
        }

        return $this;
    }

    public function removeChefGroupe(ChefGroupe $chefGroupe): self
    {
        if ($this->chefGroupes->removeElement($chefGroupe)) {
            // set the owning side to null (unless already changed)
            if ($chefGroupe->getCompany() === $this) {
                $chefGroupe->setCompany(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Groupe[]
     */
    public function getGroupes(): Collection
    {
        return $this->groupes;
    }

    public function addGroupe(Groupe $groupe): self
    {
        if (!$this->groupes->contains($groupe)) {
            $this->groupes[] = $groupe;
            $groupe->setCompany($this);
        }

        return $this;
    }

    public function removeGroupe(Groupe $groupe): self
    {
        if ($this->groupes->removeElement($groupe)) {
            // set the owning side to null (unless already changed)
            if ($groupe->getCompany() === $this) {
                $groupe->setCompany(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Salle[]
     */
    public function getSalles(): Collection
    {
        return $this->salles;
    }

    public function addSalle(Salle $salle): self
    {
        if (!$this->salles->contains($salle)) {
            $this->salles[] = $salle;
            $salle->setCompany($this);
        }

        return $this;
    }

    public function removeSalle(Salle $salle): self
    {
        if ($this->salles->removeElement($salle)) {
            // set the owning side to null (unless already changed)
            if ($salle->getCompany() === $this) {
                $salle->setCompany(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Poste[]
     */
    public function getPostes(): Collection
    {
        return $this->postes;
    }

    public function addPoste(Poste $poste): self
    {
        if (!$this->postes->contains($poste)) {
            $this->postes[] = $poste;
            $poste->setCompany($this);
        }

        return $this;
    }

    public function removePoste(Poste $poste): self
    {
        if ($this->postes->removeElement($poste)) {
            // set the owning side to null (unless already changed)
            if ($poste->getCompany() === $this) {
                $poste->setCompany(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->setCompany($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->removeElement($user)) {
            // set the owning side to null (unless already changed)
            if ($user->getCompany() === $this) {
                $user->setCompany(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Autorisation[]
     */
    public function getAutorisations(): Collection
    {
        return $this->autorisations;
    }

    public function addAutorisation(Autorisation $autorisation): self
    {
        if (!$this->autorisations->contains($autorisation)) {
            $this->autorisations[] = $autorisation;
            $autorisation->setCompany($this);
        }

        return $this;
    }

    public function removeAutorisation(Autorisation $autorisation): self
    {
        if ($this->autorisations->removeElement($autorisation)) {
            // set the owning side to null (unless already changed)
            if ($autorisation->getCompany() === $this) {
                $autorisation->setCompany(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Conge[]
     */
    public function getConges(): Collection
    {
        return $this->conges;
    }

    public function addConge(Conge $conge): self
    {
        if (!$this->conges->contains($conge)) {
            $this->conges[] = $conge;
            $conge->setCompany($this);
        }

        return $this;
    }

    public function removeConge(Conge $conge): self
    {
        if ($this->conges->removeElement($conge)) {
            // set the owning side to null (unless already changed)
            if ($conge->getCompany() === $this) {
                $conge->setCompany(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Tache[]
     */
    public function getTaches(): Collection
    {
        return $this->taches;
    }

    public function addTach(Tache $tach): self
    {
        if (!$this->taches->contains($tach)) {
            $this->taches[] = $tach;
            $tach->setCompany($this);
        }

        return $this;
    }

    public function removeTach(Tache $tach): self
    {
        if ($this->taches->removeElement($tach)) {
            // set the owning side to null (unless already changed)
            if ($tach->getCompany() === $this) {
                $tach->setCompany(null);
            }
        }

        return $this;
    }
}
