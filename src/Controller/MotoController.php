<?php

namespace App\Controller;

use App\Entity\Moto;
use App\Form\MotoType;
use App\Repository\MotoRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Config\Monolog\HandlerConfig\PublisherConfig;

class MotoController extends AbstractController
{
     #[Route('/moto',name: 'app_moto_index')]
             public function index(Request $request ,EntityManagerInterface $em): Response{
    
                $motos = $em->getRepository(Moto::class)->findAll();
    
     
         return $this->render('moto/index.html.twig',[
              'moto'=> $motos
         ]);
    }
   
 #[Route(path: '/moto/{marque}-{id}', name: 'app_moto_show', requirements : ['id'=> '\d+', 'marque'=> '[a-z0-9-]+'])] 
          public function show(Request $request,string $Marque,int $id, MotoRepository $repository): Response{
    
               
  
    
            $moto = $repository->find($id);
                    
            if($moto->getMarque() !== $Marque){
              return $this->redirectToRoute('app_moto_show', ['id' => $moto->getId(), 'slug' => $moto->getMarque()]);
          }
            return $this->render('moto/show.html.twig',[
         
              'moto'=>$moto
          ]);
    }
          
       
        
    
    
            
    
      }
    
    
    
        
    
    