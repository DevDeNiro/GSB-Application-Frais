<?php

namespace App\Entity;

use App\Repository\VehiculeRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity(repositoryClass=VehiculeRepository::class)
 */
class Vehicule
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $marque;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $modele;

    /**
     * @ORM\Column(type="string", length=9)
     * @Assert\Regex(
     *     pattern = "#^([a-hj-np-rtvx-z]{2}|s[a-hj-np-rtv-z]|w[a-hj-np-tvx-z])-[0-9]{3}-([a-hj-np-rtv-z]{2}|s[a-hj-np-rtv-z])$#i",
     *     message = "L'immatriculation du véhicule doit respecter le format AA-123-AA"
     * )
     */
    private $immatriculation;

    /**
     * @ORM\Column(type="string", length=15)
     */
    private $carburant;

    /**
     * @ORM\Column(type="bigint")
     */
    private $chevaux;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $proprietaire;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMarque(): ?string
    {
        return $this->marque;
    }

    public function setMarque(string $marque): self
    {
        $this->marque = $marque;

        return $this;
    }

    public function getModele(): ?string
    {
        return $this->modele;
    }

    public function setModele(string $modele): self
    {
        $this->modele = $modele;

        return $this;
    }

    public function getImmatriculation(): ?string
    {
        return $this->immatriculation;
    }

    public function setImmatriculation(string $immatriculation): self
    {
        $this->immatriculation = $immatriculation;

        return $this;
    }

    public function getCarburant(): ?string
    {
        return $this->carburant;
    }

    public function setCarburant(string $carburant): self
    {
        $this->carburant = $carburant;

        return $this;
    }

    public function getChevaux(): ?string
    {
        return $this->chevaux;
    }

    public function setChevaux(string $chevaux): self
    {
        $this->chevaux = $chevaux;

        return $this;
    }

    public function getProprietaire(): ?string
    {
        return $this->proprietaire;
    }

    public function setProprietaire(string $proprietaire): self
    {
        $this->proprietaire = $proprietaire;

        return $this;
    }
}

