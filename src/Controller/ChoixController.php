<?php

namespace App\Controller;

use App\Repository\ChoixRepository;
use App\Repository\ExplicationRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ChoixController extends AbstractController
{
    #[Route('/explication/{nbr}', name: 'app_explication')]
    public function index(int $nbr , ChoixRepository $choixRepository, ExplicationRepository $explicationRepository): Response
    {
         $explication = $choixRepository->findExplication($nbr);


        return $this->render('explication/index.html.twig', [
            "explication" => $explication,

        ]);
    }
}
