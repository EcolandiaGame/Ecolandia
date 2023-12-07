<?php

namespace App\Repository;

use App\Entity\NomStatistique;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<NomStatistique>
 *
 * @method NomStatistique|null find($id, $lockMode = null, $lockVersion = null)
 * @method NomStatistique|null findOneBy(array $criteria, array $orderBy = null)
 * @method NomStatistique[]    findAll()
 * @method NomStatistique[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NomStatistiqueRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NomStatistique::class);
    }

    

//    /**
//     * @return NomStatistique[] Returns an array of NomStatistique objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('n')
//            ->andWhere('n.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('n.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?NomStatistique
//    {
//        return $this->createQueryBuilder('n')
//            ->andWhere('n.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
