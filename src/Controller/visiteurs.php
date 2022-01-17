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

use App\Entity\Vehicule;
use App\Form\VehiculeType;

use App\Entity\FraisHorsForfait;
use App\Entity\User;
use App\Form\FraisHorsForfaitType;

use App\Entity\FraisForfait;
use App\Form\FraisForfaitType;

use Twig\Extra\Intl\IntlExtension;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\SecurityContextInterface;

use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\User\PasswordUpgraderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;



class visiteurs extends AbstractController
{

    /**
     * @var Security
     */
    private $security;

    public function __construct(Security $security)
    {
       $this->security = $security;
    }

    // private $entityManager;

    // public function __construct(EntityManagerInterface $entityManager)
    // {
    //     $this->entityManager = $entityManager;
    // }

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
        setlocale(LC_TIME, "fr_FR");
        $mois_actuel = date("F");

        $fiche = new FraisForfait ();

        $form = $this->createForm(FraisForfaitType::class, $fiche); 

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $user = $this->getUser();
            $user = $user->getId();
            $fiche->setProprietaire($user);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($fiche);
            $entityManager->flush();

            $this->addFlash('success1', 'Frais forfaitaire ajouté avec succès !'); // Affiche un message de confirmation sur la page d'accueil   
            return $this->redirectToRoute('accueil_visiteurs');  // Rediriger vers la page d'accueil
        }

        return $this->render('visiteurs\frais_forfait.html.twig',[    
            'form' => $form->createView(),
            'date' => $mois_actuel,
        ]); 
    }

    /**
     * @Route("/visiteurs/choix_fiche", name = "choix_fiche")
     * @Method({"GET", "POST"})
    */

    public function choix_fiche() : Response           
    {
        return $this->render('visiteurs\choix_fiche.html.twig', [
        ]); 
    }





    /**
     * @Route("/visiteurs/frais_hors_forfais", name = "fiche_frais")
     * @Method({"GET", "POST"})
    */

    public function Saisir_frais_2(Request $request) : Response    
    {
        setlocale(LC_TIME, "fr_FR");
        $mois_actuel = date("F");

        $fiche2 = new FraisHorsForfait ();
        $entityManager = $this->getDoctrine()->getManager();

        $form = $this->createForm(FraisHorsForfaitType::class, $fiche2); 
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user = $this->getUser();
            $user = $user->getId();
            $fiche2->setProprietaire($user);

            $entityManager->persist($fiche2);
            $entityManager->flush();

            $this->addFlash('success1', 'Frais hors forfait ajouté avec succès !'); // Affiche un message de confirmation sur la page d'accueil   
            return $this->redirectToRoute('accueil_visiteurs');  // Rediriger vers la page d'accueil
        }

        return $this->render('visiteurs\frais_hors_forfait.html.twig',[ // Création du formulaire par symfony
            'form' => $form->createView(),
            'date' => $mois_actuel,
        ]); 
    }
       

    
    
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
            $user = $this->getUser();
            $user = $user->getId();

            $repository = $this->getDoctrine()
            ->getRepository(FraisHorsForfait::class)
            ->findBy(['proprietaire' => $user]);

            $repository2 = $this->getDoctrine()
            ->getRepository(FraisForfait::class)
            ->findBy(['proprietaire' => $user]);

            $repository3 = $this->getDoctrine()
            ->getRepository(Vehicule::class)
            ->findBy(['proprietaire' => $user]);

            return $this->render('visiteurs/remboursement_visiteur.html.twig', [
                "Hors_Forfait" => $repository,
                "ÔForfait" => $repository2,
                "vehicule" => $repository3
            ]); 
        }
    

    /**
     * @Route("/visiteurs/vehicule", name = "vehicule")
    */  
    
    public function Saisi_vehicule(Request $request) 
    {
        $Vehicule = new Vehicule();
        $entityManager = $this->getDoctrine()->getManager();
        $form = $this->createForm(VehiculeType::class, $Vehicule); 
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
       
            $user = $this->getUser();
            $user = $user->getId();
            $Vehicule->setProprietaire($user);

            $entityManager->persist($Vehicule);
            $entityManager->flush();

            $this->addFlash('success1', 'Véhicule ajouté avec succès !'); // Affiche un message de confirmation sur la page d'accueil   
            return $this->redirectToRoute('accueil_visiteurs');  // Rediriger vers la page d'accueil
             
        }
        return $this->render('visiteurs\vehicule_visiteur.html.twig',[ // Création du formulaire par symfony
            'form' => $form->createView()
        ]); 
    }

}
