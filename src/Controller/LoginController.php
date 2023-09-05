<?php

namespace App\Controller;

use App\Entity\Responsable;
use App\Form\LoginFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;

class LoginController extends AbstractController
{
    /**
     * @Route("/", name="app_login")
     */
    public function Login(Request $request,  EntityManagerInterface $entityManager): Response
    {
        $user=new Responsable;
        $form = $this->createForm(LoginFormType::class, $user);
        $session = $request->getSession();
        $session->set('log', '0');
        $l= $entityManager->getRepository(Responsable::class)->findAll();
        
        if($request->isMethod('post'))
          {
        
          
           

           $l= $entityManager->getRepository(Responsable::class)->findAll();
            $login=$_POST['Login'];
            $pass=$_POST['password'];
            // do anything else you need here, like send an email
            if(!strcmp($login, $l[0]->getLogin()) && !strcmp($pass,$l[0]->getPass())){
                $session->set('log', '1');
            return $this->redirectToRoute('app_home');
            }
        }

        return $this->render('Login/Login.html.twig', [
            'LoginForm' => $form->createView(),
        ]);
    }
}
