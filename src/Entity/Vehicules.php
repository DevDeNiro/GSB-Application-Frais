<?php

namespace App\Entity;

use App\Repository\VehiculesRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=VehiculesRepository::class)
 */
class Vehicules
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @ORM\ManyToOne(targetEntity="post")
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
     *     message = "L'immatriculation du véhicule doit être valide"
     * )
     * @Assert\NotBlank()
     * 
     */
    private $immatriculation;

    /**
     * @ORM\Column(type="string", length=15)
     * @Assert\NotBlank()
     */
    private $carburant;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank()
     */
    private $chevaux_fiscaux;

   
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

    public function getChevauxFiscaux(): ?string
    {
        return $this->chevaux_fiscaux;
    }

    public function setChevauxFiscaux(string $chevaux_fiscaux): self
    {
        $this->chevaux_fiscaux = $chevaux_fiscaux;

        return $this;
    }

     
}
