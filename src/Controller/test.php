<?php
// src/Controller/LuckyController.php
namespace App\Controller;

// include 
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Equipement;
use App\Form\FormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class test extends AbstractController
{

     /**
     * @Route("/form", name = "formulaire")
     * @Method({"GET"})
    */

    public function Ajouter_Bdd(Request $request) : Response // Fonction qui permet d'ajouter un nouveau matériel dans la base de données via un formulaire
    {
        
        return $this->render('test.html.twig',[ // Création du formulaire par symfony
          
        
        ]);
    }
}
