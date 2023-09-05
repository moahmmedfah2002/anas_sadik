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
use \Symfony\Component\HttpFoundation\Session\SessionInterface;

class LoginController extends AbstractController
{
    /**
     * @Route("/", name="app_login")
     */
    public function Login(Request $request,  EntityManagerInterface $entityManager,SessionInterface $session): Response
    {
        $session->set('log', '0');
        $request->setSession($session);
        $user = new Responsable();
        $form = $this->createForm(LoginFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
          
            $user->setPass($form->get('Password')->getData());

            $session->set('log', '1');
            $request->setSession($session);

            return $this->redirectToRoute('app_home');
        }

        return $this->render('Login/Login.html.twig', [
            'LoginForm' => $form->createView(),
        ]);
    }
}
