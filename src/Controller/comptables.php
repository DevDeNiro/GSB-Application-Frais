<?php
namespace App\Controller;

// include 
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Equipement;
use App\Form\FormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class comptables extends AbstractController
{

     /**
     * @Route("/comptables/accueil_comptable", name = "accueil_comptables")
     * @Method({"GET", "POST"})
    */
    
    public function afficherBdd() : Response // Fonction qui permet d'afficher tous le matériel sur la page d'accueil
    {
        return $this->render('comptables/accueil_comptable.html.twig', [
        ]); 
    }

    /**
     * @Route("/comptables/fiche_comptable", name = "liste_visiteur")
     * @Method({"GET", "POST"})
    */
    
    public function fiche() : Response // Fonction qui permet d'afficher tous le matériel sur la page d'accueil
    {
        return $this->render('comptables/liste_visiteur.html.twig', [
        ]); 
    }

     /**
     * @Route("/comptables/fiche_frais", name = "suivi_frais")
     * @Method({"GET", "POST"})
    */
    
    public function suivi() : Response // Fonction qui permet d'afficher tous le matériel sur la page d'accueil
    {
        return $this->render('comptables/fiche_frais.html.twig', [
        ]); 
    }
}
