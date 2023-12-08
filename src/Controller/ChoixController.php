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


class ChoixController extends AbstractController
{
    public function __construct(
        private Security $security,
        private RequestStack $requestStack,
    ){
    }



    #[Route('/explication/{nbr}', name: 'app_explication')]
    public function index(int $nbr , ChoixRepository $choixRepository, ExplicationRepository $explicationRepository, PartieRepository $partieRepository , RequestStack $requestStack): Response
    {
         $choix = $choixRepository->findBy(['id' => $nbr]);
         $explication = $choix[0]->getExplication();

        $partie = $partieRepository->getByUser($this->security->getUser());
        $partie[0]->setScore($partie[0]->getScore() + 1);



        return $this->render('explication/index.html.twig', [
            "explication" => $explication,

        ]);
    }
}
