<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EvenementController extends AbstractController
{
    #[Route('/evenement', name: 'app_evenement')]
    public function index(): Response
    {
        return $this->render('evenement/index.html.twig', [
            'controller_name' => 'EvenementController',
        ]);
    }

    #[Route('/jouer', name:'app_evenement')]
    public function getEvenement(EvenementRepository $evenementRepository, EntityManager $entityManager) : Response{
        $id = random_int($evenementRepository->getMinId(), $evenementRepository->getMaxId());
        
        $repository = $entityManager->getRepository(Evenement::class);
        $evenement = $repository->find($id);

        return $this->render('jouer/index.html.twig', [
            'evenement' => $evenement
        ]);
    }
}
