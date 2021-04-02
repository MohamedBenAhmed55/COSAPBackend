<?php

namespace App\Entity;

use App\Repository\HeuresTravailRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ORM\Entity(repositoryClass=HeuresTravailRepository::class)
 */
#[ApiResource]
class HeuresTravail
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="time")
     */
    private $heure_deb;

    /**
     * @ORM\Column(type="time")
     */
    private $heure_fin;

    /**
     * @ORM\Column(type="time")
     */
    private $heure_deb_pause;

    /**
     * @ORM\Column(type="time")
     */
    private $heure_fin_pause;

    /**
     * @ORM\Column(type="boolean")
     */
    private $is_seance_unique;

    /**
     * @ORM\ManyToOne(targetEntity=Company::class, inversedBy="heuresTravails")
     */
    private $company;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHeureDeb(): ?\DateTimeInterface
    {
        return $this->heure_deb;
    }

    public function setHeureDeb(\DateTimeInterface $heure_deb): self
    {
        $this->heure_deb = $heure_deb;

        return $this;
    }

    public function getHeureFin(): ?\DateTimeInterface
    {
        return $this->heure_fin;
    }

    public function setHeureFin(\DateTimeInterface $heure_fin): self
    {
        $this->heure_fin = $heure_fin;

        return $this;
    }

    public function getHeureDebPause(): ?\DateTimeInterface
    {
        return $this->heure_deb_pause;
    }

    public function setHeureDebPause(\DateTimeInterface $heure_deb_pause): self
    {
        $this->heure_deb_pause = $heure_deb_pause;

        return $this;
    }

    public function getHeureFinPause(): ?\DateTimeInterface
    {
        return $this->heure_fin_pause;
    }

    public function setHeureFinPause(\DateTimeInterface $heure_fin_pause): self
    {
        $this->heure_fin_pause = $heure_fin_pause;

        return $this;
    }

    public function getIsSeanceUnique(): ?bool
    {
        return $this->is_seance_unique;
    }

    public function setIsSeanceUnique(bool $is_seance_unique): self
    {
        $this->is_seance_unique = $is_seance_unique;

        return $this;
    }

    public function getCompany(): ?Company
    {
        return $this->company;
    }

    public function setCompany(?Company $company): self
    {
        $this->company = $company;

        return $this;
    }
}
