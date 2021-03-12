<?php

namespace App\Repository;

use App\Entity\VerticalHistory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method VerticalHistory|null find($id, $lockMode = null, $lockVersion = null)
 * @method VerticalHistory|null findOneBy(array $criteria, array $orderBy = null)
 * @method VerticalHistory[]    findAll()
 * @method VerticalHistory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VerticalHistoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, VerticalHistory::class);
    }

    // /**
    //  * @return VerticalHistory[] Returns an array of VerticalHistory objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?VerticalHistory
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
