<?php

namespace App\Controller;

use App\Repository\ChoixRepository;
use App\Repository\ExplicationRepository;
use App\Repository\PartieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\StatistiqueRepository;
use App\Repository\InflueRepository;
use Symfony\Bundle\SecurityBundle\Security;

class ChoixController extends AbstractController
{

    public function __construct(
        private Security $security,
    ){
    }

    #[Route('/explication/{nbr}', name: 'app_explication', methods: ['GET'])]
    public function index(int $nbr , ChoixRepository $choixRepository, ExplicationRepository $explicationRepository, PartieRepository $partieRepository, StatistiqueRepository $statistiqueRepository, InflueRepository $influeRepository): Response
    {
        $choix = $choixRepository->findById($nbr);
        $explication = $explicationRepository->findByChoix($choix);
        $partie = $partieRepository->getByUser($this->security->getUser());
        $partie->setScore($partie->getScore() + 1);

        $stats = $statistiqueRepository->findByPartie($partie);

        for($i=0;$i<3;$i++){
            $stats[$i]->setPoints($stats[$i]->getPoints() + $influeRepository->getByChoix($choixRepository->getOnById($_GET[$id])));
        }


        return $this->render('explication/index.html.twig', [
            "explication" => $explication,

        ]);
    }
}
