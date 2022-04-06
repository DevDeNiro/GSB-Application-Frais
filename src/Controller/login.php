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

    // public function test(Request $request, ManagerRegistry $doctrine) : Response // Fonction qui permet d'ajouter un nouveau matériel dans la base de données via un formulaire
    // {      
    
    //     return $this->render('login/login.html.twig',[ // Création du formulaire par symfony   
        
    //     ]);
    // }

    public function test(Request $request, ManagerRegistry $doctrine) : Response // Fonction qui permet d'ajouter un nouveau matériel dans la base de données via un formulaire
    {      

        user = new User();
        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);
        if ($form->isSubmitted()&& $form->isValid()){
            $password = $passwordEncoder->encorePassword($user, $user->getPlainPassword());
            $user->setPassword($password);


            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('register');
        }
    
        return $this->render('login/form.html.twig',[ // Création du formulaire par symfony   
        
        ]);
    }
}
