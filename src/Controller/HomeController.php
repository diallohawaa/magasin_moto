<?php

namespace App\Controller;

use App\Entity\Recipe;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
#extends AbstractController veut dire  l'herritage
class HomeController extends AbstractController
{
    #[Route( "/moto", name: "app_moto_index")]
    public function index(Request $request,EntityManagerInterface $em): Response{

        $motos = $em->getRepository(Moto::class)->findAll();
        
        return $this->render('moto/index.html.twig',[
            'motos'=> $motos
        ]);
    }


    #[Route(path: '/moto/{marrque}-{nom}', name: 'app_moto_show', requirements : ['nom'=> '\d+', 'marque'=> '[a-z0-9-]+'])] 

    public function show(Request $request,string $marque,int $nom, RecipeRepository $repository): Response{

    }
}
