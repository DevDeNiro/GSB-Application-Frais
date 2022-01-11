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
use App\Entity\User;

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
     * @Route("/visiteurs/frais_forfait", name = "frais_forfait")
     * @Method({"GET", "POST"})
    */

    public function Saisir_frais(Request $request) : Response           
    {
        $fiche = new FraisForfait ();

        $form = $this->createForm(FraisForfaitType::class, $fiche); 

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($fiche);
            $entityManager->flush();

            $this->addFlash('OK', 'Vos frais ont bien été saisis !');
        }

        return $this->render('visiteurs\frais_forfait.html.twig',[    
            'form' => $form->createView(),
        ]); 
    }

    /**
     * @Route("/visiteurs/choix_fiche", name = "choix_fiche")
     * @Method({"GET", "POST"})
    */

    public function choix_fiche() : Response           
    {
        // $date_Engagement = $this->getDoctrine()
                // ->getRepository(User::class)           
                // ->find($date_embauche);

        return $this->render('visiteurs\choix_fiche.html.twig', [
            // "date" => $date_ngagement
        ]); 
    }

    /**
     * @Route("/visiteurs/frais_hors_forfais", name = "fiche_frais")
     * @Method({"GET", "POST"})
    */

    public function Saisir_frais_2(Request $request) : Response    
    {
        $fiche2 = new FraisHorsForfait ();
        $entityManager = $this->getDoctrine()->getManager();

        $form = $this->createForm(FraisHorsForfaitType::class, $fiche2); 
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
       
            $entityManager->persist($fiche2);
            $entityManager->flush();
            $this->addFlash('ok', 'Vos frais ont bien été saisis !');

        }

        return $this->render('visiteurs\frais_hors_forfait.html.twig',[ // Création du formulaire par symfony
            'form' => $form->createView()
        ]); 
    }
       
    /**
     * @Route("/visiteurs/suivi_frais", name = "visiteur_frais")
     * @Method({"GET", "POST"})
     */
    
    
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
            $auForfait = $this->getDoctrine()
                ->getRepository(FraisForfait::class)           
                ->findAll();

            $horsForfait = $this->getDoctrine()
                ->getRepository(FraisHorsForfait::class)           
                ->findAll();

            return $this->render('visiteurs/remboursement_visiteur.html.twig', [
                "Hors_Forfait" => $horsForfait,
                "ÔForfait" => $auForfait
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

            $this->addFlash('success1', 'Votre véhicule a été ajouté avec succès ! ');                 
        }

        return $this->render('visiteurs\vehicule_visiteur.html.twig',[ // Création du formulaire par symfony
            'form' => $form->createView()
        ]); 
    }

}
