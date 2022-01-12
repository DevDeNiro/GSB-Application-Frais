<?php
namespace App\Controller;

// include 
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use App\Entity\User;
use App\Controller\PaginatorInterface;

use App\Entity\RechercheClient;
use App\Form\RechercheClientType;

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
    
    // public function suivi_fiche_frais() : Response
    // {

    //     // $em=$this->getDoctrine()->getManager();

    //     $repository = $this->getDoctrine()
    //             ->getRepository(User::class)
    //             ->findAll();

                
    //     // $em->remove($repository);
    //     // $em->flush();

    //     // $this->addFlash('success', 'Suppression effectuée'); 

    //             // if (!$repository) {
    //             //     throw $this->createNotFoundException(
    //             //         'Il n\'existe aucun produit en BdD'
    //             //     );
    //             // }

    //     return $this->render('comptables/fiche_frais.html.twig', [
    //         "fiches" => $repository
    //     ]); 
    // }






    // public function findAllVisibleQuery(RechercheClient $search): Query
    // {
    //     $query = $this->$findVisibleQuery();

    //     if ($search->getDateUser()) {
    //         $query = $query
    //             ->where ('$dateUser > mindate')
    //             ->setParameter('mindate', $search->getDateUser());
    //     }


    //     return $query->getQuery();
    // } 


    public function recherche_client(/*PaginatorInterface $paginator, */ Request $request): Response
    {
        $search = new RechercheClient();
        $form = $this->createForm (RechercheClientType::class, $search);
        $form->handleRequest($request);

        // $properties = $paginator->paginate(
        //     $this->repository->findAllVisibleQuery($search),
        //     $request-> query ('page', 1),12
        // );

        return $this->render ('comptables/fiche_frais.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
