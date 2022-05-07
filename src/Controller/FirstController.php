<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use function mysql_xdevapi\getSession;

class FirstController extends AbstractController
{
    #[Route(
        '/first/{name}/{prenom}/{age<\d+>}',
        name: 'app_first',
        defaults: ['name' =>'amine','prenom'=>'gasmi','age'=>'20'],


    )]
    public function index(Request $request,$name,$prenom,$age): Response
    {

        return $this->render('first/index.html.twig', [
            'controller_name' => 'FirstController',
            'name' => $name,
            'prenom' => $prenom,
            'age'=>$age
        ]);
    }
}
