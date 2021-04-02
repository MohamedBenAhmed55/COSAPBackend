<?php

namespace App\Entity;

use App\Repository\CongeRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ORM\Entity(repositoryClass=CongeRepository::class)
 */
#[ApiResource]
class Conge
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $date_deb;

    /**
     * @ORM\Column(type="date")
     */
    private $date_fin;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date_reprise;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Type;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $is_half_day;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $is_validated;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="conges")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity=Company::class, inversedBy="conges")
     */
    private $company;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateDeb(): ?\DateTimeInterface
    {
        return $this->date_deb;
    }

    public function setDateDeb(\DateTimeInterface $date_deb): self
    {
        $this->date_deb = $date_deb;

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

    public function getDateReprise(): ?\DateTimeInterface
    {
        return $this->date_reprise;
    }

    public function setDateReprise(?\DateTimeInterface $date_reprise): self
    {
        $this->date_reprise = $date_reprise;

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

    public function getIsHalfDay(): ?bool
    {
        return $this->is_half_day;
    }

    public function setIsHalfDay(?bool $is_half_day): self
    {
        $this->is_half_day = $is_half_day;

        return $this;
    }

    public function getIsValidated(): ?bool
    {
        return $this->is_validated;
    }

    public function setIsValidated(?bool $is_validated): self
    {
        $this->is_validated = $is_validated;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

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
