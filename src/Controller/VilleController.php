<?php

namespace App\Controller;

use App\Entity\Ville;
use App\Repository\VilleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VilleController extends AbstractController
{
    /**
     * @Route("/ville", name="ville")
     */
    public function index(VilleRepository $villerepository): Response
    {
    
        
        // dd($villerepository->findAll());

        return $this->render('ville/index.html.twig', [
            'ville' => $villerepository->findAll()
        ]);
      
    }
      /**
     * @Route("/single-ville/{id}", name="single-ville")
     */  
    public function singleVille(int $id = 0): Response
    {
        $repository = $this->getDoctrine()->getRepository(Ville::class);
        $id = $repository->findOneBy([
            'id' => $id,
        ]);
        dump($id);
        return $this->render('ville/single-ville.html.twig', ["id" => $id]);
    }
   
  
}
