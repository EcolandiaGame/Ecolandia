<?php

namespace App\Controller;

use App\Repository\PartieRepository;
use App\Repository\StatistiqueRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RequestStack;

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

    public function __construct(
        private RequestStack $requestStack
    ){
    }

    #[Route('/ecolandia/verif', name: 'app_verif')]
    public function verif(PartieRepository $partieRepository, StatistiqueRepository $statistiqueRepository, RequestStack $requestStack): Response
    {

        $session = $this->requestStack->getSession();
        $indice = $session->get('indiceevent');




        $session->set('indiceevent', $indice+1);
        $indice_after = $session->get('indiceevent');



        $PartieActuelleId = $partieRepository->getByLastId();

        $statistique= $statistiqueRepository->findBy(['partie' => $PartieActuelleId]);

        foreach ($statistique as $stat) {
            if($stat->getPoints()==0){
                return $this->render('defeat/gameover.html.twig',
                );
            }
        }



        return $this->render('ecolandia/game.html.twig',
        );
    }
}
