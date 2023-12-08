<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ExplicationController extends AbstractController
{
    #[Route('/explication', name: 'app_explication')]
    public function index(): Response
    {
        return $this->render('explication/index.html.twig', [
            'controller_name' => 'ExplicationController',
        ]);
    }
}
