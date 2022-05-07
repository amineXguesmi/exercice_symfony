<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SessionController extends AbstractController
{
    #[Route('/session', name: 'app_session')]
    public function index(Request $request): Response
    {
        $session=$request->getSession();
        if($session->has('nbr')){
        $nbrev=$session->get('nbr')+1;
        }
        else {
            $nbrev=1;

        }
        $session->set('nbr',$nbrev);

        return $this->render('session/index.html.twig', [
            'controller_name' => 'SessionController',
            'nbre_visite'=>$nbrev,

        ]);
    }
}
