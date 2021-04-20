<?php

namespace App\Repository;

use App\Entity\BasketballCategory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method BasketballCategory|null find($id, $lockMode = null, $lockVersion = null)
 * @method BasketballCategory|null findOneBy(array $criteria, array $orderBy = null)
 * @method BasketballCategory[]    findAll()
 * @method BasketballCategory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BasketballCategoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BasketballCategory::class);
    }

    // /**
    //  * @return BasketballCategory[] Returns an array of BasketballCategory objects
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
    public function findOneBySomeField($value): ?BasketballCategory
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
