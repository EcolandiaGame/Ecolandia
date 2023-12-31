<?php

namespace App\Repository;

use App\Entity\Statistique;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Statistique>
 *
 * @method Statistique|null find($id, $lockMode = null, $lockVersion = null)
 * @method Statistique|null findOneBy(array $criteria, array $orderBy = null)
 * @method Statistique[]    findAll()
 * @method Statistique[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StatistiqueRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Statistique::class);
    }

    /*
    public function findByPartie($utilisateur)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('partie_id = select(max(id) from partie where utilisateur_id = :utilisateur')
            ->setParameters('utilisateur', $utilisateur)
            ->getQuery()
            ->getResult();
    }
    */
    public function findByPartie($partie)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.partie = :partie')
            ->setParameter('partie', $partie)
            ->getQuery()
            ->getResult();
    }


//    /**
//     * @return Statistique[] Returns an array of Statistique objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Statistique
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
