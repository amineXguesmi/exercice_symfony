<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TodoController extends AbstractController
{
    #[Route('/todo', name: 'app_todo')]
    public function index(Request $request): Response
    {  $session=$request->getSession();

        if(!$session->has('todo')){
            $todo=array(
            );
            $session->set('todo',$todo);
            $this->addFlash('success','la liste de todo est cree');
        }

        return $this->render('todo/index.html.twig', [
            'controller_name' => 'TodoController',
        ]);
    }

     #[Route('/todo/add/{name}/{content}', name: 'ajout_todo')]
public function addTodo(Request $request,$name,$content):RedirectResponse
     {
         $session = $request->getSession();
         if (!$session->has('todo')) {
             $this->addFlash('error', 'la liste de todo n est pas encore initialise');
         }
        else{
            $todo=$session->get('todo');
            if(isset($todo[$name])){
                $this->addFlash('info', 'deja existe');
            }
            else {
                $this->addFlash('success', 'ajouté avec success');
                $todo[$name]=$content;
                $session->set('todo',$todo);
            }
        }
         return $this->redirectToRoute('app_todo');
     }

     #[Route('/todo/reset', name: 'reset_todo')]
public function resetTodo(Request $request):RedirectResponse{
         $session = $request->getSession();
        if($session->has('todo')){
            $session->remove('todo');
            $this->addFlash('success', 'reset avec success');
        }
        return $this->redirectToRoute('app_todo');
     }
    #[Route('/todo/delete/{name}', name: 'delete_todo')]
public function deleteTodo(Request $request,$name):RedirectResponse{
        $session = $request->getSession();
        if(!$session->has('todo')){
            $this->addFlash('error', "la liste de todo n'est pas encore initialisé");
        }
        else {
            $todo=$session->get('todo');
            if(array_key_exists($name,$todo)){
                unset($todo[$name]);
                $this->addFlash('success', 'supprimer avec success');
                $session->set('todo',$todo);
            }
            else {
                $this->addFlash('error', "element n'existe pas");
            }

        }
        return $this->redirectToRoute('app_todo');
    }
#[Route('/todo/update/{name}/{content}', name: 'update_todo')]
public function updateTodo(Request $request,$name,$content):RedirectResponse{
    $session = $request->getSession();
    if(!$session->has('todo')){
        $this->addFlash('error', "la liste de todo n'est pas encore initialisé");
    }
    else{
        $todo=$session->get('todo');
        if(array_key_exists($name,$todo)){
            $todo[$name]=$content;
            $this->addFlash('success', 'update avec success');
            $session->set('todo',$todo);
        }
        else {
            $this->addFlash('error', "element n'existe pas");
        }
    }

    return $this->redirectToRoute('app_todo');
}
}
