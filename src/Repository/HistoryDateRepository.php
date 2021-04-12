<?php

namespace App\Repository;

use App\Entity\HistoryDate;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method HistoryDate|null find($id, $lockMode = null, $lockVersion = null)
 * @method HistoryDate|null findOneBy(array $criteria, array $orderBy = null)
 * @method HistoryDate[]    findAll()
 * @method HistoryDate[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HistoryDateRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, HistoryDate::class);
    }

    // /**
    //  * @return HistoryDate[] Returns an array of HistoryDate objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('h.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?HistoryDate
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
