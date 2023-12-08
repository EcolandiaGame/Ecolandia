<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\EvenementRepository;
use App\Repository\StatistiqueRepository;
use App\Repository\PartieRepository;
use App\Repository\ChoixRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Evenenement;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Request;

class EvenementController extends AbstractController
{
    #[Route('/evenement', name: 'app_evenement')]
    public function index(): Response
    {
        return $this->render('evenement/index.html.twig', [
            'controller_name' => 'EvenementController',
        ]);
    }

    public function __construct(
        private Security $security,
        private RequestStack $requestStack
    ){
    }

    #[Route('/ecolandia/game', name:'app_game')]
    public function getEvenement(RequestStack $requestStack, EvenementRepository $evenementRepository,EntityManagerInterface $entityManager,StatistiqueRepository $statistiqueRepository, PartieRepository $partieRepository, ChoixRepository $choixRepository, Request $request) : Response{
        /*$id = random_int($evenementRepository->getMinId()->getId(), $evenementRepository->getMaxId()->getId());
        $user = $this->security->getUser();
        $partie = $partieRepository->getByUser($user);
        $evenement = $evenementRepository->find($id);*/
        $eventarray = $evenementRepository->findAll();
        shuffle($eventarray);

        $indiceevent = 0;
        $evenement = $eventarray[$indiceevent];

        $user = $this->security->getUser();
        $partie = $partieRepository->getByUser($user);

        $session = $this->requestStack->getSession();
        $session->set('indiceevent', $indiceevent);
        $session->set('eventarray', $eventarray);

        $indice = $session->get('indiceevent');
        $eventarray = $session->get('eventarray');

        $id = $eventarray[$indice]->getId();

        $evenement = $evenementRepository->find($id);
        
        return $this->render('ecolandia/game.html.twig', [
            'evenement' => $evenement,
            'stats' => $statistiqueRepository->findByPartie($partie),
            'choix' => $choixRepository->getByEvent($evenement),
            'partie' => $partie,
        ]);
    }

    

}
