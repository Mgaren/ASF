<?php

namespace App\Repository;

use App\Entity\SectionSalary;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SectionSalary|null find($id, $lockMode = null, $lockVersion = null)
 * @method SectionSalary|null findOneBy(array $criteria, array $orderBy = null)
 * @method SectionSalary[]    findAll()
 * @method SectionSalary[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SectionSalaryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SectionSalary::class);
    }

    // /**
    //  * @return SectionSalary[] Returns an array of SectionSalary objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SectionSalary
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
