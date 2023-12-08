<?php

namespace App\Controller;

use App\Repository\PartieRepository;
use App\Repository\StatistiqueRepository;
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

    #[Route('/ecolandia/verif', name: 'app_verif')]
    public function verif(PartieRepository $partieRepository, StatistiqueRepository $statistiqueRepository): Response
    {
        $PartieActuelleId = $partieRepository->getByLastId();

        $statistique= $statistiqueRepository->findBy(['partie' => $PartieActuelleId]);
        dd($statistique);


        return $this->render('ecolandia/verif.html.twig',
        );
    }
}
