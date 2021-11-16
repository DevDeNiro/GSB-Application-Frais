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
}
