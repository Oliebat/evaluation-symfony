<?php

namespace App\Controller;
use App\Entity\Restaurant;
use App\Repository\RestaurantRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RestaurantController extends AbstractController
{
    /**
     * @Route("/restaurant", name="restaurant")
     */
    public function index(RestaurantRepository $restaurantrepository): Response
    {

        // dd($restaurantrepository->findAll());

        return $this->render('restaurant/index.html.twig', [
            'restaurant' => $restaurantrepository->findAll()
        ]);
    }
         /**
     * @Route("/single-restaurant/{id}", name="single-restaurant")
     */  
    public function singleRestaurant(int $id = 0): Response
    {
        $repository = $this->getDoctrine()->getRepository(Restaurant::class);
        $id = $repository->findOneBy([
            'id' => $id,
        ]);
        dump($id);
        return $this->render('restaurant/single-restaurant.html.twig', ["id" => $id]);
    }
      
}
