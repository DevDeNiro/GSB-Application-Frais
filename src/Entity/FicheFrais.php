<?php

namespace App\Entity;

use App\Repository\FicheFraisRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=FicheFraisRepository::class)
 */
class FicheFrais
{

    const ETAT = [          // Constante pour définir les différents états
        0 => 'Remboursée',
        1 => 'Saisie clôturée',
        2 => 'Fiche créée, saisie en cours',
        3 => 'Validée et mise en paiement',
    ];

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @ManyToOne(targetEntity="App\Entity\User", inversedBy="id")
     * @JoinColumn(name="fiche_id", referencedColumnName="id"
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     * @Assert\NotBlank()
     */
    private $mois;

    /**
     * @ORM\Column(type="string", length=5)
     * @Assert\NotBlank()
     */
    private $nbJustificatif;

    /**
     * @ORM\Column(type="string", length=6)
     * @Assert\NotBlank()
     */
    private $montantValide;

    /**
     * @ORM\Column(type="datetime")
     * @Assert\NotBlank()
     */
    private $dateModif;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank()
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

    public function getEtat(): ?int
    {
        return $this->etat;
    }

    public function setEtat(int $etat): self
    {
        $this->etat = $etat;

        return $this;
    }
}
