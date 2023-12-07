<?php

namespace App\Repository;

use App\Entity\Arriver;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Arriver>
 *
 * @method Arriver|null find($id, $lockMode = null, $lockVersion = null)
 * @method Arriver|null findOneBy(array $criteria, array $orderBy = null)
 * @method Arriver[]    findAll()
 * @method Arriver[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArriverRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Arriver::class);
    }

//    /**
//     * @return Arriver[] Returns an array of Arriver objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('a.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Arriver
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
