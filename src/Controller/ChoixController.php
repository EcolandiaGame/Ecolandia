<?php

namespace App\Controller;

use App\Repository\ChoixRepository;
use App\Repository\ExplicationRepository;
use App\Repository\PartieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ChoixController extends AbstractController
{
    #[Route('/explication/{nbr}', name: 'app_explication')]
    public function index(int $nbr , ChoixRepository $choixRepository, ExplicationRepository $explicationRepository, PartieRepository $partieRepository): Response
    {
         $choix = $choixRepository->findBy(['id' => $nbr]);
         $explication = $choix[0]->getExplication();

        $partie = $partieRepository->getByUser($this->security->getUser());
        $partie->setScore($partie->getScore + 1);



        return $this->render('explication/index.html.twig', [
            "explication" => $explication,

        ]);
    }
}
