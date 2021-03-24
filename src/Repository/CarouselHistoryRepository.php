<?php

namespace App\Repository;

use App\Entity\CarouselHistory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CarouselHistory|null find($id, $lockMode = null, $lockVersion = null)
 * @method CarouselHistory|null findOneBy(array $criteria, array $orderBy = null)
 * @method CarouselHistory[]    findAll()
 * @method CarouselHistory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CarouselHistoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CarouselHistory::class);
    }

    // /**
    //  * @return CarouselHistory[] Returns an array of CarouselHistory objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CarouselHistory
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
