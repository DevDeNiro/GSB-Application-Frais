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

use App\Entity\FraisForfait;
use App\Entity\FraisHorsforfait;
use App\Form\SaisiFicheFraisType;


class visiteurs extends AbstractController
{

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/accueil_visiteur", name = "accueil_visiteurs")
     * @Method({"POST"})
    */
    
    public function afficherBdd() : Response 
    {
        return $this->render('visiteurs/accueil_visiteur.html.twig', [

        ]); 
    }

    /**
     * @Route("/frais_visiteur", name = "fiche_frais")
     * @Method({"POST"})
    */
    
    public function fiche(Request $request) : Response
    {
        $fiche = new SaisiFicheFrais ();
        $entityManager = $this->getDoctrine()->getManager();

        $form = $this->createForm(SaisiFicheFraisType::class, $fiche); 
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
       
            $entityManager->persist($fiche);
            $entityManager->flush();

            $this->addFlash('success', 'Véhicule ajouté'); // Affiche un message de confirmation sur la page d'accueil   
            return $this->redirectToRoute('accueil_visiteurs');  // Rediriger vers la page d'accueil
             
        }

        return $this->render('visiteurs\fiche_visiteur.html.twig',[ // Création du formulaire par symfony
            'form' => $form->createView()
        ]); 
    }
       
    

     /**
     * @Route("/suivi_frais", name = "visiteur_frais")
     * @Method({"POST"})
    */
    
    public function suivi() : Response 
    {
        return $this->render('visiteurs/remboursement_visiteur.html.twig', [

        ]); 
    }

    /**
     * @Route("/vehicule", name = "vehicules")
     * @Method({"POST"})
    */
    
    public function vehicule(Request $request) : Response 
    {

        $Vehicule = new Vehicules ();
        $entityManager = $this->getDoctrine()->getManager();

        $form = $this->createForm(VehiculesType::class, $Vehicule); 
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
       
            $entityManager->persist($Vehicule);
            $entityManager->flush();

            $this->addFlash('success', 'Véhicule ajouté'); // Affiche un message de confirmation sur la page d'accueil   
            return $this->redirectToRoute('accueil_visiteurs');  // Rediriger vers la page d'accueil
             
        }

        return $this->render('visiteurs\vehicule_visiteur.html.twig',[ // Création du formulaire par symfony
            'form' => $form->createView()
        ]); 
    }

    // public function Immatriculation (ValidatorInterface $validator) 

    // {
    //     $immatriculation = new Immatriculation;
    //     $errors = $validator->validate($immatriculation);


    //     if (preg_match('#^([a-hj-np-tvx-z][a-hj-np-rtv-z]|[a-hj-np-rtv-z][a-hj-np-tvx-z])-?[0-9]{3}-?([a-hj-np-tv-z][a-hj-np-rtv-z]|[a-hj-np-rtv-z][a-hj-np-tv-z])$#i', $immatriculation) || preg_match('#[0-9]{1,4}(-)?[a-z]{2,3}(-)?(?:(9)7[1-6]|0[1-9]|[1-8][0-9]|9[1-5])#', $errors))
    //         {
    //             $errorsString = (string) $errors;
    //             return new Response($errorsString);            
    //         }

    //     return new Response('The author is valid! Yes!');
    // }
}
