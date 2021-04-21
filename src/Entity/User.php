<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Annotation\ApiResource;


/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
#[ApiResource]
class User implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $username;

    /**
     * @ORM\Column(type="json")
     *
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     * 
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=8)
     */
    private $cin;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="date")
     */
    private $date_nai;

    /**
     * @ORM\Column(type="date")
     */
    private $date_embauche;

    /**
     * @ORM\Column(type="string", length=1)
     */
    private $Genre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Adresse;

    /**
     * @ORM\Column(type="float")
     */
    private $Salaire;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $phone;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Fax;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Pays;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Etat_presence;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $matricule;

    /**
     * @ORM\ManyToOne(targetEntity=Company::class, inversedBy="users")
     */
    private $company;

    /**
     * @ORM\ManyToOne(targetEntity=Groupe::class, inversedBy="users")
     */
    private $groupe;

    /**
     * @ORM\OneToMany(targetEntity=Autorisation::class, mappedBy="user")
     */
    private $autorisations;

    /**
     * @ORM\OneToMany(targetEntity=Conge::class, mappedBy="user")
     */
    private $conges;

    /**
     * @ORM\OneToOne(targetEntity=Poste::class, cascade={"persist", "remove"})
     */
    private $poste;

    /**
     * @ORM\OneToMany(targetEntity=Notification::class, mappedBy="id_user_recepteur")
     */
    private $notifications;

    /**
     * @ORM\OneToMany(targetEntity=Tache::class, mappedBy="user_destinataire")
     */
    private $taches;

    public function __construct()
    {
        $this->autorisations = new ArrayCollection();
        $this->conges = new ArrayCollection();
        $this->taches = new ArrayCollection();
        $this->notifications = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
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

    public function getCin(): ?string
    {
        return $this->cin;
    }

    public function setCin(string $cin): self
    {
        $this->cin = $cin;

        return $this;
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

    public function getDateNai(): ?\DateTimeInterface
    {
        return $this->date_nai;
    }

    public function setDateNai(\DateTimeInterface $date_nai): self
    {
        $this->date_nai = $date_nai;

        return $this;
    }

    public function getDateEmbauche(): ?\DateTimeInterface
    {
        return $this->date_embauche;
    }

    public function setDateEmbauche(\DateTimeInterface $date_embauche): self
    {
        $this->date_embauche = $date_embauche;

        return $this;
    }

    public function getGenre(): ?string
    {
        return $this->Genre;
    }

    public function setGenre(string $Genre): self
    {
        $this->Genre = $Genre;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->Adresse;
    }

    public function setAdresse(string $Adresse): self
    {
        $this->Adresse = $Adresse;

        return $this;
    }

    public function getSalaire(): ?float
    {
        return $this->Salaire;
    }

    public function setSalaire(float $Salaire): self
    {
        $this->Salaire = $Salaire;

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

    public function getFax(): ?string
    {
        return $this->Fax;
    }

    public function setFax(string $Fax): self
    {
        $this->Fax = $Fax;

        return $this;
    }

    public function getPays(): ?string
    {
        return $this->Pays;
    }

    public function setPays(string $Pays): self
    {
        $this->Pays = $Pays;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getEtatPresence(): ?string
    {
        return $this->Etat_presence;
    }

    public function setEtatPresence(?string $Etat_presence): self
    {
        $this->Etat_presence = $Etat_presence;

        return $this;
    }

    public function getMatricule(): ?string
    {
        return $this->matricule;
    }

    public function setMatricule(string $matricule): self
    {
        $this->matricule = $matricule;

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

    public function getGroupe(): ?Groupe
    {
        return $this->groupe;
    }

    public function setGroupe(?Groupe $groupe): self
    {
        $this->groupe = $groupe;

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
            $autorisation->setUser($this);
        }

        return $this;
    }

    public function removeAutorisation(Autorisation $autorisation): self
    {
        if ($this->autorisations->removeElement($autorisation)) {
            // set the owning side to null (unless already changed)
            if ($autorisation->getUser() === $this) {
                $autorisation->setUser(null);
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
            $conge->setUser($this);
        }

        return $this;
    }

    public function removeConge(Conge $conge): self
    {
        if ($this->conges->removeElement($conge)) {
            // set the owning side to null (unless already changed)
            if ($conge->getUser() === $this) {
                $conge->setUser(null);
            }
        }

        return $this;
    }

    public function getPoste(): ?Poste
    {
        return $this->poste;
    }

    public function setPoste(?Poste $poste): self
    {
        $this->poste = $poste;

        return $this;
    }


    /**
     * @return Collection|Notification[]
     */
    public function getNotifications(): Collection
    {
        return $this->notifications;
    }

    public function addNotification(Notification $notification): self
    {
        if (!$this->notifications->contains($notification)) {
            $this->notifications[] = $notification;
            $notification->setIdUserRecepteur($this);
        }

        return $this;
    }

    public function removeNotification(Notification $notification): self
    {
        if ($this->notifications->removeElement($notification)) {
            // set the owning side to null (unless already changed)
            if ($notification->getIdUserRecepteur() === $this) {
                $notification->setIdUserRecepteur(null);
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
            $tach->setUserDestinataire($this);
        }

        return $this;
    }

    public function removeTach(Tache $tach): self
    {
        if ($this->taches->removeElement($tach)) {
            // set the owning side to null (unless already changed)
            if ($tach->getUserDestinataire() === $this) {
                $tach->setUserDestinataire(null);
            }
        }

        return $this;
    }
}
