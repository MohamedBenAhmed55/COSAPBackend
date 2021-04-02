<?php

namespace App\Entity;

use App\Repository\NotificationRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ORM\Entity(repositoryClass=NotificationRepository::class)
 */
#[ApiResource]
class Notification
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
    private $date_notif;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="boolean")
     */
    private $is_read;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="notifications")
     */
    private $id_user_emmetteur;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="notifications")
     */
    private $id_user_recepteur;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateNotif(): ?\DateTimeInterface
    {
        return $this->date_notif;
    }

    public function setDateNotif(\DateTimeInterface $date_notif): self
    {
        $this->date_notif = $date_notif;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getIsRead(): ?bool
    {
        return $this->is_read;
    }

    public function setIsRead(bool $is_read): self
    {
        $this->is_read = $is_read;

        return $this;
    }

    public function getIdUserEmmetteur(): ?User
    {
        return $this->id_user_emmetteur;
    }

    public function setIdUserEmmetteur(?User $id_user_emmetteur): self
    {
        $this->id_user_emmetteur = $id_user_emmetteur;

        return $this;
    }

    public function getIdUserRecepteur(): ?User
    {
        return $this->id_user_recepteur;
    }

    public function setIdUserRecepteur(?User $id_user_recepteur): self
    {
        $this->id_user_recepteur = $id_user_recepteur;

        return $this;
    }
}
