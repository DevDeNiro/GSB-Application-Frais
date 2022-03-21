<?php
namespace App\Controller;

// include 
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class redirect extends AbstractController
{
    /**
     * @Route("/redirect", name = "redirect")
     * @Method({"GET"})
    */

    public function loginRedirectAction(Request $request)
{

    if (!$this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY'))
    {
        return $this->redirectToRoute('login');
        // throw $this->createAccessDeniedException();
    }

    if($this->get('security.authorization_checker')->isGranted('ROLE_VISITEUR'))
    {
        return $this->redirectToRoute('accueil_visiteurs');
    }
    else if($this->get('security.authorization_checker')->isGranted('ROLE_COMPTABLE'))
    {
        return $this->redirectToRoute('accueil_comptables');
    }
    else
    {
        return $this->redirectToRoute('login');
    }
}
}
