<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use App\Entity\Responsable;

class HomeController extends AbstractController
{
    

    /**
     * @Route("/home", name="app_home")
     */
    public function index(Request $request): Response
    {
        $session = $request->getSession();
        $log=$session->get('log');
        if($log!="1"){
            return $this->redirectToRoute('app_login');
            
            
           
        }


        return $this->render('home/index.html.twig', [
            
               ]);
    }
}
