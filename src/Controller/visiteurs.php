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
     * @Route("/accueil_visiteur", name = "accueil_visiteurs")
     * @Method({"GET", "POST"})
    */
    
    public function afficherBdd() : Response 
    {
        return $this->render('visiteurs/accueil_visiteur.html.twig', [

        ]); 
    }

    /**
     * @Route("/frais_visiteur", name = "fiche_frais")
     * @Method({"GET", "POST"})
    */
    
    public function fiche() : Response
    {
        return $this->render('visiteurs/fiche_visiteur.html.twig', [

        ]); 
    }

     /**
     * @Route("/suivi_frais", name = "visiteur_frais")
     * @Method({"GET", "POST"})
    */
    
    public function suivi() : Response 
    {
        return $this->render('visiteurs/remboursement_visiteur.html.twig', [

        ]); 
    }

    /**
     * @Route("/vehicule", name = "vehicule")
     * @Method({"GET", "POST"})
    */
    
    public function vehicule() : Response 
    {
        return $this->render('visiteurs/vehicul_visiteur.html.twig', [

        ]); 
    }
}
