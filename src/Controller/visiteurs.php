<?php
namespace App\Controller;

// include 

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;

use App\Entity\Vehicule;
use App\Form\VehiculeType;

use App\Entity\FraisHorsForfait;
use App\Form\FraisHorsForfaitType;

use App\Entity\FraisForfait;
use App\Form\FraisForfaitType;

use Symfony\Component\Security\Core\Security;


class visiteurs extends AbstractController
{

    /**
     * @var Security
     */

    private $security;
    private $entityManager;


    public function __construct(Security $security, EntityManagerInterface $entityManager)
    {
       $this->security = $security;
       $this->entityManager = $entityManager;
    }

    /**
     * @Route("/visiteurs/accueil_visiteur", name = "accueil_visiteurs")
     * @Method({"GET", "POST"})
    */
    
    public function Accueil() : Response 
    {
        $user = $this->getUser();
        $user = $user->getId();

        $repository26 = $this->getDoctrine()
            ->getRepository(FraisForfait::class)
            ->findBy(['etat' => "En attente", 'proprietaire' => $user]);

        $repository27 = $this->getDoctrine()
        ->getRepository(FraisForfait::class)
        ->findBy(['etat' => "Rejeté", 'proprietaire' => $user]);
        
        $repository28 = $this->getDoctrine()
        ->getRepository(FraisForfait::class)
        ->findBy(['etat' => "Validé", 'proprietaire' => $user]);

        $repository26BIS = $this->getDoctrine()
            ->getRepository(FraisHorsForfait::class)
            ->findBy(['etat' => "En attente", 'proprietaire' => $user]);

        $repository27BIS = $this->getDoctrine()
        ->getRepository(FraisHorsForfait::class)
        ->findBy(['etat' => "Rejeté", 'proprietaire' => $user]);
        
        $repository28BIS = $this->getDoctrine()
        ->getRepository(FraisHorsForfait::class)
        ->findBy(['etat' => "Validé", 'proprietaire' => $user]);

        return $this->render('/visiteurs/accueil_visiteur.html.twig', [
            "attente" => $repository26,
            "rejete" => $repository27,
            "valide" => $repository28,
            "attenteBIS" => $repository26BIS,
            "rejeteBIS" => $repository27BIS,
            "valideBIS" => $repository28BIS
        ]); 
    }

    /**
     * @Route("/visiteurs/choix_fiche", name = "choix_fiche")
     * @Method({"GET", "POST"})
    */

    public function choix_fiche() : Response           
    {
        setlocale(LC_TIME, "fr_FR");
        $mois_actuel = date("m / Y");

        $user = $this->getUser();
        $user = $user->getId();

        $repository28 = $this->getDoctrine()
            ->getRepository(Vehicule::class)
            ->findBy(['proprietaire' => $user]);

        return $this->render('visiteurs\choix_fiche.html.twig', [
            'date' => $mois_actuel,
            'vehicule' => $repository28
        ]); 
    }

     /**
     * @Route("/visiteurs/frais_forfait", name = "frais_forfait")
     * @Method({"GET", "POST"})
    */

    public function Saisir_frais(Request $request) : Response           
    {
        setlocale(LC_TIME, "fr_FR");
        $mois_actuel = date("m Y");

        $user = $this->getUser();
        $user = $user->getId();

        $repository28 = $this->getDoctrine()
            ->getRepository(Vehicule::class)
            ->findBy(['proprietaire' => $user]);

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

            $this->addFlash('success1', 'Frais forfaitaire ajouté avec succès !');    
            return $this->redirectToRoute('accueil_visiteurs');  // Rediriger vers la page d'accueil
        }

        return $this->render('visiteurs\frais_forfait.html.twig',[    
            'form' => $form->createView(),
            'date' => $mois_actuel,
            'vehicule' => $repository28
        ]); 
    }

    /**
     * @Route("/visiteurs/frais_hors_forfais", name = "frais_hors_forfait")
     * @Method({"GET", "POST"})
    */

    public function Saisir_frais_2(Request $request) : Response    
    {
        setlocale(LC_TIME, "fr_FR");
        $mois_actuel = date("m Y");

        $user = $this->getUser();
        $user = $user->getId();

        $repository28 = $this->getDoctrine()
            ->getRepository(Vehicule::class)
            ->findBy(['proprietaire' => $user]);

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

            $this->addFlash('success1', 'Frais hors forfait ajouté avec succès !');    
            return $this->redirectToRoute('accueil_visiteurs');  // Rediriger vers la page d'accueil
        }

        return $this->render('visiteurs\frais_hors_forfait.html.twig',[ 
            'form' => $form->createView(),
            'date' => $mois_actuel,
            'vehicule' => $repository28
        ]); 
    }
    
     /**
     * @Route("/visiteurs/suivi_frais", name = "visiteur_frais")
     * @Method({"GET", "POST"})
     */

    public function Suivre_frais_hors_forfait() : Response 
        {
            setlocale(LC_TIME, "fr_FR");
            $mois_actuel = date("m Y");

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
                "horsForfait" => $repository,
                "ÔForfait" => $repository2,
                "vehicule" => $repository3,
                'date' => $mois_actuel,
            ]); 
        }
    

    /**
     * @Route("/visiteurs/vehicule", name = "vehicule")
    */  
    
    public function Saisi_vehicule(Request $request) 
    {
        setlocale(LC_TIME, "fr_FR");
        $mois_actuel = date("m Y");

        $user = $this->getUser();
        $user = $user->getId();

        $repository30 = $this->getDoctrine()
            ->getRepository(Vehicule::class)
            ->findBy(['proprietaire' => $user]);
        
        $Vehicule = new Vehicule();
        $entityManager = $this->getDoctrine()->getManager();
        $form = $this->createForm(VehiculeType::class, $Vehicule); 
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user = $this->getUser();
            $user = $user->getId();
            
            $test = $Vehicule->getProprietaire();

            $user = $this->getUser();
            $user = $user->getId();

            $Vehicule->setProprietaire($user);

            $entityManager->persist($Vehicule);
            $entityManager->flush();

            $this->addFlash('success1', 'Véhicule ajouté avec succès !');    
            return $this->redirectToRoute('remplacement_vehicule', array('id' => $user));   
        }

        return $this->render('visiteurs\vehicule_visiteur.html.twig',[ 
            'form' => $form->createView(),
            'date' => $mois_actuel,
            'vehicule' => $repository30
        ]); 
    }

    /**
     * @Route("/supprimer/{id}", name = "supprimer")
    */

    public function supprimer(int $id) : Response{ // Supprimer un métériel ciblé

        $entityManager = $this->getDoctrine()->getManager();
        
        $repository = $this->getDoctrine()
                ->getRepository(FraisForfait::class)
                ->find($id);


        $entityManager->remove($repository);
        $entityManager->flush();

        $this->addFlash('succesSuppr', 'Suppression effectuée'); 
        
        return $this->redirectToRoute('visiteur_frais'); // Rediriger vers la page d'accueil
    }

    /**
     * @Route("/supprimer2/{id}", name = "supprimer2")
    */

    public function supprimer2(int $id) : Response{ // Supprimer un métériel ciblé

        $entityManager = $this->getDoctrine()->getManager();
        
        $repository = $this->getDoctrine()
                ->getRepository(FraisHorsForfait::class)
                ->find($id);


        $entityManager->remove($repository);
        $entityManager->flush();

        $this->addFlash('succesSuppr', 'Suppression effectuée'); 
        
        return $this->redirectToRoute('visiteur_frais'); // Rediriger vers la page d'accueil
    }

    /**
     * @Route("/supprimer3/{id}", name = "supprimer3")
    */

    public function supprimer_frais_forfait(int $id) : Response{ // Supprimer un métériel ciblé

        $entityManager = $this->getDoctrine()->getManager();
        
        $repository = $this->getDoctrine()
                ->getRepository(FraisForfait::class)
                ->find($id);


        $entityManager->remove($repository);
        $entityManager->flush();

        $this->addFlash('modif', 'Modification effectuée'); 
        
        return $this->redirectToRoute('visiteur_frais'); // Rediriger vers la page d'accueil
    }

    /**
     * @Route("/supprimer4/{id}", name = "supprimer4")
    */

    public function supprimer_frais_hors_forfait(int $id) : Response{ // Supprimer un métériel ciblé

        $entityManager = $this->getDoctrine()->getManager();
        
        $repository = $this->getDoctrine()
                ->getRepository(FraisHorsForfait::class)
                ->find($id);

        $entityManager->remove($repository);
        $entityManager->flush();

        $this->addFlash('modif', 'Modification effectuée'); 
        
        return $this->redirectToRoute('visiteur_frais'); // Rediriger vers la page d'accueil
    }

    /**
     * @Route("/supprimer5/{id}", name = "supprimer5")
    */

    public function supprimer_vehicule(int $id) : Response{ // Supprimer un métériel ciblé
        
        $entityManager = $this->getDoctrine()->getManager();
        
        $repository = $this->getDoctrine()
                ->getRepository(Vehicule::class)
                ->findOneBy(['proprietaire' => $id]);

        $entityManager->remove($repository);
        $entityManager->flush();

        // $this->addFlash('modif2', 'Modification effectuée'); 
        
        return $this->redirectToRoute('vehicule'); // Rediriger vers la page d'accueil
    }

    /**
     * @Route("/supprimer6/{id}", name = "supprimer6")
    */

    public function supprimer6(int $id) : Response{ // Supprimer un métériel ciblé
        
        $entityManager = $this->getDoctrine()->getManager();
        
        $repository = $this->getDoctrine()
                ->getRepository(Vehicule::class)
                ->findOneBy(['proprietaire' => $id], array('id' => 'DESC'));

        $entityManager->remove($repository);
        $entityManager->flush();

        // $this->addFlash('modif2', 'Modification effectuée'); 
        
        return $this->redirectToRoute('vehicule'); // Rediriger vers la page d'accueil
    }

    /**
     * @Route("/visiteurs/remplacement_vehicule/{id}", name = "remplacement_vehicule")
    */

    public function remplacement_vehicule(int $id) : Response{ // Supprimer un métériel ciblé
                
        $repository = $this->getDoctrine()
                ->getRepository(Vehicule::class)
                ->findBy(['proprietaire' => $id]);

        return $this->render('visiteurs\remplacement_vehicule.html.twig',[ 
            'repo' => $repository
        ]); 
    }

     /**
     * @Route("/modifier.auForfait/{id}", name = "modifier")
    */

    public function modifier_auForfait(Request $request, int $id) : Response 
    {
        setlocale(LC_TIME, "fr_FR");
        $mois_actuel = date("m Y");

        $user = $this->getUser();
        $user = $user->getId();

        $repository28 = $this->getDoctrine()
            ->getRepository(FraisForfait::class)
            ->findBy(['proprietaire' => $user, 'id' => $id]);

        $repository29 = $this->getDoctrine()
        ->getRepository(Vehicule::class)
        ->findBy(['proprietaire' => $user]);

        $fiche = new FraisForfait ();

        $form = $this->createForm(FraisForfaitType::class, $fiche); 

        $form->handleRequest($request);
        $entityManager = $this->getDoctrine()->getManager();

        if ($form->isSubmitted() && $form->isValid()) {
            $user = $this->getUser();
            $user = $user->getId();
            $fiche->setProprietaire($user);

            $entityManager->persist($fiche);
            $this->entityManager->flush();

            $this->addFlash('success18', 'Frais forfaitaire modifié avec succès !');  
            return $this->redirectToRoute('supprimer3', array('id' => $id));  
        }
        
         return $this->render('visiteurs\Edit_frais_forfait.html.twig',[ 
            'form' => $form->createView(),
            'date' => $mois_actuel,
            'Forfait' => $repository28,
            'vehicule' => $repository29
        ]); 
    }

    /**
     * @Route("/modifier.horsForfait/{id}", name = "modifier2")
    */

    public function modifier_horsForfait(Request $request, int $id) : Response
    { 
        
        setlocale(LC_TIME, "fr_FR");
        $mois_actuel = date("m Y");

        $user = $this->getUser();
        $user = $user->getId();

        $repository28 = $this->getDoctrine()
            ->getRepository(FraisHorsForfait::class)
            ->findBy(['proprietaire' => $user, 'id' => $id]);

        $repository29 = $this->getDoctrine()
        ->getRepository(Vehicule::class)
        ->findBy(['proprietaire' => $user]);

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

            return $this->redirectToRoute('supprimer4', array('id' => $id));  
        }

        return $this->render('visiteurs\Edit_frais_hors_forfait.html.twig',[ 
            'form' => $form->createView(),
            'date' => $mois_actuel,
            'horsForfait' => $repository28,
            'vehicule' => $repository29
        ]); 
    }
}
