<?php
namespace App\Controller;

// include 
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use App\Entity\Vehicule;
use App\Form\VehiculeType;

use App\Entity\FraisHorsForfait;
use App\Entity\User;
use App\Form\FraisHorsForfaitType;

use App\Entity\FraisForfait;
use App\Form\FraisForfaitType;

class comptables extends AbstractController
{

    private $em;

    public function __construct (EntityManagerInterface $em)
    {
        $this->EntityManager = $em;
    }

     /**
     * @Route("/comptables/accueil_comptable", name = "accueil_comptables")
     * @Method({"GET", "POST"})
    */
    
    public function afficherBdd() : Response
    {
        return $this->render('/comptables/accueil_comptable.html.twig', [
        ]); 
    }

    /**
     * @Route("/comptables/fiche_comptable", name = "liste_visiteur")
     * @Method({"GET", "POST"})
    */
    
    public function Afficher_liste_visiteur() : Response
    {
        $repository = $this->getDoctrine()
        ->getRepository(User::class)
        ->findAll();

        if (!$repository) {
            throw $this->createNotFoundException(
                'Il n\'existe aucun utilisateur en base de donnée'
            );
        }

        return $this->render('comptables/liste_visiteur.html.twig', [
            "liste_visiteur" => $repository
        ]); 
    }

     /**
     * @Route("/comptables/fiche_frais", name = "suivi_frais")
     * @Method({"GET", "POST"})
    */
    
    public function suivi_fiche_frais() : Response
    {
            $user = $this->getUser();
            $user = $user->getId();

            $repository = $this->getDoctrine()
            ->getRepository(FraisHorsForfait::class)
            ->findBy(['proprietaire' => $user]);

            $repository2 = $this->getDoctrine()
            ->getRepository(FraisForfait::class)
            ->findAll();

            $repository3 = $this->getDoctrine()
            ->getRepository(Vehicule::class)
            ->findAll();

            $repository4 = $this->getDoctrine()
            ->getRepository(User::class)
            ->findAll();

            return $this->render('comptables\fiche_frais.html.twig', [
                "Hors_Forfait" => $repository,
                "Forfait" => $repository2,
                "vehicule" => $repository3,
                "user" => $repository4
            ]);
    }
}
