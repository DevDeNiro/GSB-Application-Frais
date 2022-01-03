<?php

namespace App\Entity;

use App\Repository\FraisHorsForfaitRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=FraisHorsForfaitRepository::class)
 */
class FraisHorsForfait
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
    private $mois;

    /**
     * @ORM\Column(type="integer")
     */
    private $montant;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $libelle;

    /**
     * @ORM\Column(type="date")
     */
    private $dates;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMois()
    {
        return $this->mois;
    }

    public function setMois($mois): self
    {
        $this->mois = $mois;

        return $this;
    }

    public function getMontant(): ?int
    {
        return $this->montant;
    }

    public function setMontant(int $montant): self
    {
        $this->montant = $montant;

        return $this;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getDates(): ?\DateTime
    {
        return $this->dates;
    }

    public function setDates(\DateTime $dates): self
    {
        $this->dates = $dates;

        return $this;
    }
}
