<?php

namespace App\Repository;

use App\Entity\PartenaireCategory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PartenaireCategory|null find($id, $lockMode = null, $lockVersion = null)
 * @method PartenaireCategory|null findOneBy(array $criteria, array $orderBy = null)
 * @method PartenaireCategory[]    findAll()
 * @method PartenaireCategory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PartenaireCategoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PartenaireCategory::class);
    }

    // /**
    //  * @return PartenaireCategory[] Returns an array of PartenaireCategory objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PartenaireCategory
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
