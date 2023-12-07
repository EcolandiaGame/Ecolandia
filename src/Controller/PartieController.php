<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Utilisateur;

class PartieController extends AbstractController
{
    #[Route('/partie', name: 'app_partie')]
    public function index(): Response
    {
        return $this->render('partie/index.html.twig', [
            'controller_name' => 'PartieController',
        ]);
    }

    public function createPartie(Utilisateur $utilisateur, EntityManagerInterface $entityManager){
        $partie = new Partie();
        $partie-> setUtilisateur($utilisateur);
        $partie-> setDatePartie(date(now()));
        
        $entityManager->persist($partie);
        $entityManager->flush();
    }
}
