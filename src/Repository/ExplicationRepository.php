<?php

namespace App\Repository;

use App\Entity\Explication;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Explication>
 *
 * @method Explication|null find($id, $lockMode = null, $lockVersion = null)
 * @method Explication|null findOneBy(array $criteria, array $orderBy = null)
 * @method Explication[]    findAll()
 * @method Explication[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExplicationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Explication::class);
    }

//    /**
//     * @return Explication[] Returns an array of Explication objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('e.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Explication
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
    public function  findOneByExplication($nbr)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.id = :nbr')
            ->setParameter('nbr', $nbr)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
}
