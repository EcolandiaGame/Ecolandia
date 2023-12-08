<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Utilisateur;
use App\Entity\Partie;
use App\Repository\NomStatistiqueRepository;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Bundle\SecurityBundle\Security;
use App\Entity\Statistique;


class EcolandiaController extends AbstractController
{
    #[Route('/ecolandia', name: 'app_ecolandia')]
    public function index(): Response
    {
        return $this->render('ecolandia/index.html.twig',
        );
    }

    public function __construct(
        private Security $security,
    ){
    }

    #[Route('/ecolandia/newgame', name: 'app_newgame')]
    public function game(Utilisateur $utilisateur, EntityManagerInterface $entityManager, NomStatistiqueRepository $nomStatistiqueRepository): Response
    {
        $partie = new Partie();
        $partie->setUtilisateur($this->security->getUser());
        $partie->setDatePartie(new \DateTime('now'));
        $partie->setScore(0);
        
        $entityManager->persist($partie);
        $entityManager->flush();

        for ($i=1; $i<4; $i++){
            $stats = new Statistique;
            $stats->setSeNomme($nomStatistiqueRepository->findOneById($i));
            $stats->setPartie($partie);
            $stats->setPoints(5);

            $entityManager->persist($stats);
            $entityManager->flush();
        }
        

        return $this->render('ecolandia/newgame.html.twig',
        );
    }
    
}
