<?php

namespace App\Controller;

use App\Repository\ChoixRepository;
use App\Repository\ExplicationRepository;
use App\Repository\PartieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\StatistiqueRepository;
use App\Repository\InflueRepository;
use Doctrine\ORM\EntityManagerInterface;


class ChoixController extends AbstractController
{
    public function __construct(
        private Security $security,
        private RequestStack $requestStack,
    ){
    }



    #[Route('/explication/{nbr}', name: 'app_explication', methods: ['GET'])]
    public function index(int $nbr , ChoixRepository $choixRepository, ExplicationRepository $explicationRepository, PartieRepository $partieRepository , RequestStack $requestStack, StatistiqueRepository $statistiqueRepository, InflueRepository $influeRepository, EntityManagerInterface $entityManager ): Response
    {
         $choix = $choixRepository->findBy(['id' => $nbr]);
         $explication = $choix[0]->getExplication();

        $partie = $partieRepository->getByUser($this->security->getUser());
        $partie[0]->setScore($partie[0]->getScore() + 1);

        $stats = $statistiqueRepository->findByPartie($partie);
        $influe = $influeRepository->getByChoix($choixRepository->findOneById($nbr))[0];

        for($i=0;$i<3;$i++){
            $stats[$i]->setPoints($stats[$i]->getPoints() + $influe->getChangePoints());
            
        }


        $entityManager->flush();




        return $this->render('explication/index.html.twig', [
            "explication" => $explication,
            "influe" => $influe,
        ]);
    }
}
