<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EcolandiaController extends AbstractController
{
    #[Route('/ecolandia', name: 'app_ecolandia')]
    public function index(): Response
    {
        return $this->render('ecolandia/index.html.twig',
        );
    }

    #[Route('/ecolandia/game', name: 'app_game')]
    public function game(): Response
    {
        return $this->render('ecolandia/game.html.twig',
        );
    }
}
