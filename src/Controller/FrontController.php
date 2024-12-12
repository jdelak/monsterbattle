<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class FrontController extends AbstractController
{

    #[Route('/', name: 'app_game')]
    public function home(): Response
    {
        return $this->render('game/home.html.twig', [
            
        ]);
    }

}