<?php

namespace App\Entity;

use App\Repository\VehiculesRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\JoinColumn;


/**
 * @ORM\Entity(repositoryClass=VehiculesRepository::class)
 */
class Vehicules
{

    /**
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=15)
     * @Assert\NotBlank()
     */
    private $marque;

    /**
     * @ORM\Column(type="string", length=15)
     * @Assert\NotBlank()
     */
    private $modele;

    /**
     * @ORM\Column(type="string", length=9)
     * @Assert\Regex(
     *     pattern = "#^([a-hj-np-rtvx-z]{2}|s[a-hj-np-rtv-z]|w[a-hj-np-tvx-z])-[0-9]{3}-([a-hj-np-rtv-z]{2}|s[a-hj-np-rtv-z])$#i",
     *     message = "L'immatriculation du véhicule doit respecter le format AA-123-AA"
     * )
     * @Assert\NotBlank()
     * 
     */
    private $immatriculation;

    /**
     * @ORM\Column(type="string", length=15)
     * @Assert\NotBlank()
     * @Assert\NotNull
     */
    private $carburant;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Regex(
     *     pattern = "'^[0-9]+$'",
     * )
     * @Assert\NotBlank()   
     * @Assert\Positive 
     */
    private $chevaux_fiscaux;

    /**
     * @ORM\Id
     * @ORM\Column(type="string", length=100)
     * @ManyToOne(targetEntity="App\Entity\User", inversedBy="id")
     * @JoinColumn(name="username", referencedColumnName="id")
     */
    private $usernane;

   
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

    public function getChevauxFiscaux(): ?int
    {
        return $this->chevaux_fiscaux;
    }

    public function setChevauxFiscaux(int $chevaux_fiscaux): self
    {
        $this->chevaux_fiscaux = $chevaux_fiscaux;

        return $this;
    }

    public function getUsernane(): ?string
    {
        return $this->usernane;
    }

    public function setUsernane(string $usernane): self
    {
        $this->usernane = $usernane;

        return $this;
    }

     
}
