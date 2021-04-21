<?php

namespace App\Repository;

use App\Entity\CguCategory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CguCategory|null find($id, $lockMode = null, $lockVersion = null)
 * @method CguCategory|null findOneBy(array $criteria, array $orderBy = null)
 * @method CguCategory[]    findAll()
 * @method CguCategory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CguCategoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CguCategory::class);
    }

    // /**
    //  * @return CategoryCgu[] Returns an array of CategoryCgu objects
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
    public function findOneBySomeField($value): ?CategoryCgu
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
