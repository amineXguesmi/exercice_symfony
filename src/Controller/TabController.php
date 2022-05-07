<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TabController extends AbstractController
{
    #[Route('/tab/{nb<\d+>}', name: 'app_tab')]
    public function index($nb): Response
    {  $tab=array();
        for ($i =0;$i<$nb;$i++){
            $tab[]=rand(0,20);
        }

        return $this->render('tab/index.html.twig', [
            'controller_name' => 'TabController',
            'tab'=>$tab,
        ]);
    }
    #[Route('/tab/users', name: 'app_users')]
    public function users(): Response{

        $users=[['firstname'=>'amine','name'=>'gasmi','age'=>20],
        ['firstname'=>'ahmed','name'=>'alibi','age'=>21],
        ['firstname'=>'mayca','name'=>'mechi','age'=>20],
         ['firstname'=>'ranim','name'=>'ghabri','age'=>20]
        ];
        return $this->render('tab/users.html.twig',[
            'users'=>$users
        ]);
    }
}
