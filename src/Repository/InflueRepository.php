<?php

namespace App\Repository;

use App\Entity\Influe;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Influe>
 *
 * @method Influe|null find($id, $lockMode = null, $lockVersion = null)
 * @method Influe|null findOneBy(array $criteria, array $orderBy = null)
 * @method Influe[]    findAll()
 * @method Influe[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InflueRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Influe::class);
    }

    public function getByChoix($choix){
        return $this->createQueryBuilder('i')
            ->andWhere('i.choix = :choix')
            ->setParameter('choix', $choix)
            ->getQuery()
            ->getResult();
    }

//    /**
//     * @return Influe[] Returns an array of Influe objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('i.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Influe
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
