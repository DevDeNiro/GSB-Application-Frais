<?php

namespace App\Entity;

use App\Repository\FicheFraisRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FicheFraisRepository::class)
 */
class FicheFrais
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $mois;

    /**
     * @ORM\Column(type="string", length=5)
     */
    private $nbJustificatif;

    /**
     * @ORM\Column(type="string", length=6)
     */
    private $montantValide;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateModif;

    /**
     * @ORM\Column(type="string", length=15)
     */
    private $etat;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMois(): ?string
    {
        return $this->mois;
    }

    public function setMois(string $mois): self
    {
        $this->mois = $mois;

        return $this;
    }

    public function getNbJustificatif(): ?string
    {
        return $this->nbJustificatif;
    }

    public function setNbJustificatif(string $nbJustificatif): self
    {
        $this->nbJustificatif = $nbJustificatif;

        return $this;
    }

    public function getMontantValide(): ?string
    {
        return $this->montantValide;
    }

    public function setMontantValide(string $montantValide): self
    {
        $this->montantValide = $montantValide;

        return $this;
    }

    public function getDateModif(): ?string
    {
        return $this->dateModif;
    }

    public function setDateModif(string $dateModif): self
    {
        $this->dateModif = $dateModif;

        return $this;
    }

    public function getEtat(): ?string
    {
        return $this->etat;
    }

    public function setEtat(string $etat): self
    {
        $this->etat = $etat;

        return $this;
    }
}
