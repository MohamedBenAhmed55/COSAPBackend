<?php

namespace App\Entity;

use App\Repository\EvenementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ORM\Entity(repositoryClass=EvenementRepository::class)
 */
#[ApiResource]
class Evenement
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
    private $titre;

    /**
     * @ORM\Column(type="date")
     */
    private $Date_creation;

    /**
     * @ORM\Column(type="date")
     */
    private $date_debut;

    /**
     * @ORM\Column(type="date")
     */
    private $date_fin;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Type;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Description;

    /**
     * @ORM\Column(type="boolean")
     */
    private $is_online;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Lien;

    /**
     * @ORM\ManyToOne(targetEntity=Salle::class, inversedBy="evenements")
     */
    private $salle;

    /**
     * @ORM\ManyToMany(targetEntity=User::class, inversedBy="evenements")
     * 
     */
    private $invited_users;

    /**
     * @ORM\OneToMany(targetEntity=EventUser::class, mappedBy="Evenement")
     */
    private $eventUsers;

    public function __construct()
    {
        $this->invited_users = new ArrayCollection();
        $this->eventUsers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDateCreation(): ?\DateTimeInterface
    {
        return $this->Date_creation;
    }

    public function setDateCreation(\DateTimeInterface $Date_creation): self
    {
        $this->Date_creation = $Date_creation;

        return $this;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->date_debut;
    }

    public function setDateDebut(\DateTimeInterface $date_debut): self
    {
        $this->date_debut = $date_debut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->date_fin;
    }

    public function setDateFin(\DateTimeInterface $date_fin): self
    {
        $this->date_fin = $date_fin;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->Type;
    }

    public function setType(string $Type): self
    {
        $this->Type = $Type;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    public function getIsOnline(): ?bool
    {
        return $this->is_online;
    }

    public function setIsOnline(bool $is_online): self
    {
        $this->is_online = $is_online;

        return $this;
    }

    public function getLien(): ?string
    {
        return $this->Lien;
    }

    public function setLien(string $Lien): self
    {
        $this->Lien = $Lien;

        return $this;
    }

    public function getSalle(): ?Salle
    {
        return $this->salle;
    }

    public function setSalle(?Salle $salle): self
    {
        $this->salle = $salle;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getInvitedUsers(): Collection
    {
        return $this->invited_users;
    }

    public function addInvitedUser(User $invitedUser): self
    {
        if (!$this->invited_users->contains($invitedUser)) {
            $this->invited_users[] = $invitedUser;
        }

        return $this;
    }

    public function removeInvitedUser(User $invitedUser): self
    {
        $this->invited_users->removeElement($invitedUser);

        return $this;
    }

    /**
     * @return Collection|EventUser[]
     */
    public function getEventUsers(): Collection
    {
        return $this->eventUsers;
    }

    public function addEventUser(EventUser $eventUser): self
    {
        if (!$this->eventUsers->contains($eventUser)) {
            $this->eventUsers[] = $eventUser;
            $eventUser->setEvenement($this);
        }

        return $this;
    }

    public function removeEventUser(EventUser $eventUser): self
    {
        if ($this->eventUsers->removeElement($eventUser)) {
            // set the owning side to null (unless already changed)
            if ($eventUser->getEvenement() === $this) {
                $eventUser->setEvenement(null);
            }
        }

        return $this;
    }
}
