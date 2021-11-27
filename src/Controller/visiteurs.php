<?php
namespace App\Controller;

// include 

use Doctrine\ORM\EntityManagerInterface;
use App\Repository\EquipementRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;


class visiteurs extends AbstractController
{

    /**
     * @Route("/accueil_visiteur", name = "accueil")
     * @Method({"GET", "POST"})
    */
    
    public function afficherBdd() : Response // Fonction qui permet d'afficher tous le matériel sur la page d'accueil
    {
        return $this->render('visiteurs/accueil_visiteur.html.twig', [

        ]); 
    }

    /**
     * @Route("/fiche", name = "fiche")
     * @Method({"GET", "POST"})
    */
    
    public function fiche() : Response // Fonction qui permet d'afficher tous le matériel sur la page d'accueil
    {
        return $this->render('visiteurs/fiche_visiteur.html.twig', [

        ]); 
    }

     /**
     * @Route("/suivi", name = "suivi")
     * @Method({"GET", "POST"})
    */
    
    public function suivi() : Response // Fonction qui permet d'afficher tous le matériel sur la page d'accueil
    {
        return $this->render('visiteurs/remboursement_visiteur.html.twig', [

        ]); 
    }

    /**
     * @Route("/vehicule", name = "vehicule")
     * @Method({"GET", "POST"})
    */
    
    public function vehicule() : Response // Fonction qui permet d'afficher tous le matériel sur la page d'accueil
    {
        return $this->render('visiteurs/vehicul_visiteur.html.twig', [

        ]); 
    }
}
