<?php

namespace App\Repository;

use App\Entity\SectionSport;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SectionSport|null find($id, $lockMode = null, $lockVersion = null)
 * @method SectionSport|null findOneBy(array $criteria, array $orderBy = null)
 * @method SectionSport[]    findAll()
 * @method SectionSport[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SectionSportRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SectionSport::class);
    }

    // /**
    //  * @return SectionSport[] Returns an array of SectionSport objects
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
    public function findOneBySomeField($value): ?SectionSport
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
