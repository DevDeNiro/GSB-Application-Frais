<?php
namespace App\Controller;

// include 
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

use App\Entity\User;
use App\Entity\FraisForfait;
use App\Entity\FraisHorsForfait;
use App\Entity\Vehicule;


class login extends AbstractController
{
    /**
     * @Route("", name = "login")
     * @Method({"GET"})
    */

    public function test(Request $request) : Response // Fonction qui permet d'ajouter un nouveau matériel dans la base de données via un formulaire
    {      
        
        
        // $setUser = new User();
        // $setUser->setNom('Folder');
        // $setUser->setGroupementPublic($groupementPublic);

 
        // $entityManager = $doctrine->getManager();
        // $entityManager->persist($setUser);
        // $entityManager->flush();

        return $this->render('login/login.html.twig',[ // Création du formulaire par symfony   
        
        ]);
    }
}
