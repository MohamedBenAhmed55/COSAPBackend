<?php

namespace App\Entity;

use App\Repository\EvenementUserRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EvenementUserRepository::class)
 */
class EventUser
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Evenement::class, inversedBy="eventUsers")
     */
    private $Evenement;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="eventUsers")
     */
    private $Users;

    /**
     * @ORM\Column(type="array")
     */
    private $participants = [];

    public function getEvenement(): ?Evenement
    {
        return $this->Evenement;
    }

    public function setEvenement(?Evenement $Evenement): self
    {
        $this->Evenement = $Evenement;

        return $this;
    }

    public function getUsers(): ?User
    {
        return $this->Users;
    }

    public function setUsers(?User $Users): self
    {
        $this->Users = $Users;

        return $this;
    }

    public function getParticipants(): ?array
    {
        return $this->participants;
    }

    public function setParticipants(array $participants): self
    {
        $this->participants = $participants;

        return $this;
    }

 
}
