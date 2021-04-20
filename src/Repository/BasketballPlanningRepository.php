<?php

namespace App\Repository;

use App\Entity\BasketballPlanning;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method BasketballPlanning|null find($id, $lockMode = null, $lockVersion = null)
 * @method BasketballPlanning|null findOneBy(array $criteria, array $orderBy = null)
 * @method BasketballPlanning[]    findAll()
 * @method BasketballPlanning[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BasketballPlanningRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BasketballPlanning::class);
    }

    // /**
    //  * @return BasketballPlanning[] Returns an array of BasketballPlanning objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?BasketballPlanning
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
