<?php
namespace App\Controller;

// include 
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Doctrine\Persistence\ManagerRegistry;


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

    public function test(Request $request, ManagerRegistry $doctrine) : Response // Fonction qui permet d'ajouter un nouveau matériel dans la base de données via un formulaire
    {      
     
        $setUser = new User();
        $setUser->setUsername('dandre');
        $setUser->setRoles('["ROLE_VISITEUR"]');
        $setUser->setPassword('$argon2id$v=19$m=65536,t=4,p=1$cDBFcTB0RVViMVNxTGFFQQ$51JuUEGxfdnoKkEPaHcs01EBsUNxxdGVAgaaq/7+22k');
        $setUser->setNom('Andre');
        $setUser->setPrenom('David');
        $setUser->setCp(46200);
        $setUser->setVille('Lalbenque');
        $setUser->setDateEmbauche('1998-11-23');
        $setUser->setAdresse('1 rue Petit');
 
        $entityManager = $doctrine->getManager();
        $entityManager->persist($setUser);
        $entityManager->flush();

        return $this->render('login/login.html.twig',[ // Création du formulaire par symfony   
        
        ]);
    }
}
