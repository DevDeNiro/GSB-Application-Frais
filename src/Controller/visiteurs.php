<?php
namespace App\Controller;

// include 

use Doctrine\ORM\EntityManagerInterface;
use App\Repository\EquipementRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Validator\ValidatorInterface;

use App\Entity\Vehicules;
use App\Form\VehiculesType;

use App\Entity\FraisHorsForfait;
use App\Form\FraisHorsForfaitType;

use App\Entity\FraisForfait;
use App\Form\FraisForfaitType;


class visiteurs extends AbstractController
{

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/visiteurs/accueil_visiteur", name = "accueil_visiteurs")
     * @Method({"GET", "POST"})
    */
    
    public function Accueil() : Response 
    {
        return $this->render('/visiteurs/accueil_visiteur.html.twig', [

        ]); 
    }

    /**
     * @Route("/visiteurs/frais_visiteur", name = "fiche_frais")
     * @Method({"GET", "POST"})
    */

    public function Saisir_frais(Request $request) : Response           
    {
        $fiche = new FraisForfait ();
        $fiche2 = new FraisHorsForfait();

        $form = $this->createForm(FraisForfaitType::class, $fiche); 
        $form2 = $this->createForm(FraisForfaitType::class, $fiche2); 

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($fiche);
            $entityManager->flush();
        }

        $form2 = $this->createForm(FraisHorsForfaitType::class, $fiche2); 
        $form2->handleRequest($request);
        if ($form2->isSubmitted() && $form2->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($fiche2);
            $entityManager->flush();
        }

        return $this->render('visiteurs\fiche_visiteur.html.twig',[    
            'form' => $form->createView(),
            'form2' => $form2->createView()
        ]); 
    }

    // /**
    //  * @Route("/visiteurs/frais_visiteur", name = "fiche_frais2")
    //  * @Method({"GET", "POST"})
    // */

    // public function Saisir_frais_2(Request $request) : Response    
    // {
    //     $fiche2 = new FraisHorsForfait ();
    //     $entityManager = $this->getDoctrine()->getManager();

    //     $form = $this->createForm(FraisHorsForfaitType::class, $fiche2); 
    //     $form->handleRequest($request);

    //     if ($form->isSubmitted() && $form->isValid()) {
       
    //         $entityManager->persist($fiche2);
    //         $entityManager->flush();
    //     }

    //     return $this->render('visiteurs\fiche_visiteur.html.twig',[ // Création du formulaire par symfony
    //         'form' => $form->createView()
    //     ]); 
    // }
       

    
    
    // public function Suivre_frais_forfait() : Response 
    // {
    //     $repository = $this->getDoctrine()
    //     ->getRepository(FraisForfait::class)
    //     ->findAll();

    //     return $this->render('visiteurs/remboursement_visiteur.html.twig', [
    //         "ÔForfait" => $repository
    //     ]); 

    // }

     /**
     * @Route("/visiteurs/suivi_frais", name = "visiteur_frais")
     * @Method({"GET", "POST"})
     */

    public function Suivre_frais_hors_forfait() : Response 
        {
            $repository = $this->getDoctrine()
            ->getRepository(FraisHorsForfait::class)
            ->findAll();

            return $this->render('visiteurs/remboursement_visiteur.html.twig', [
                "Hors_Forfait" => $repository
            ]); 
        }
    

    /**
     * @Route("/visiteurs/vehicule", name = "vehicule")
     * @Method({"GET", "POST"})
    */  
    
    public function Saisi_vehicule(Request $request) : Response 
    {

        $Vehicule = new Vehicules ();
        $entityManager = $this->getDoctrine()->getManager();

        $form = $this->createForm(VehiculesType::class, $Vehicule); 
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
       
            $entityManager->persist($Vehicule);
            $entityManager->flush();

            $this->addFlash('success1', 'Véhicule ajouté'); // Affiche un message de confirmation sur la page d'accueil   
            return $this->redirectToRoute('accueil_visiteurs');  // Rediriger vers la page d'accueil
             
        }

        return $this->render('visiteurs\vehicule_visiteur.html.twig',[ // Création du formulaire par symfony
            'form' => $form->createView()
        ]); 
    }

}
