<?php

namespace App\Repository;

use App\Entity\AdherantText;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AdherantText|null find($id, $lockMode = null, $lockVersion = null)
 * @method AdherantText|null findOneBy(array $criteria, array $orderBy = null)
 * @method AdherantText[]    findAll()
 * @method AdherantText[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AdherantTextRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AdherantText::class);
    }

    // /**
    //  * @return AdherantText[] Returns an array of AdherantText objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?AdherantText
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
