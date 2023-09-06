<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\AjouterStagiereType;
use App\Entity\Stagiaire;

class HomeController extends AbstractController
{
    

    /**
     * @Route("/home", name="app_home")
     */
    public function index(Request $request,  EntityManagerInterface $entityManager): Response
    {
        $stage=new Stagiaire;
        $session = $request->getSession();
        $log=$session->get('log');
        if($log!="1"){
            return $this->redirectToRoute('app_login');
            
            
           
        }
        $form1 = $this->createForm(AjouterStagiereType::class,$stage);
       
        $form1->handleRequest($request);
        if ($form1->isSubmitted() && $form1->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $stage = $form1->getData();
            $entityManager->persist($stage);
            $entityManager->flush();}



            $q = $entityManager->createQuery('select p from App\Entity\Stagiaire p');
            $users = $q->getResult();

            $a=array();
            foreach ($users as $row) {
                array_push($a,$row);
            }
          
        return $this->render('home/index.html.twig', [
            'form1'=>$form1->createView(),
            'st'=>$a
               ]);
    }
}
