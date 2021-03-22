<?php

namespace App\Repository;

use App\Entity\DirigeantsPost;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DirigeantsPost|null find($id, $lockMode = null, $lockVersion = null)
 * @method DirigeantsPost|null findOneBy(array $criteria, array $orderBy = null)
 * @method DirigeantsPost[]    findAll()
 * @method DirigeantsPost[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DirigeantsPostRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DirigeantsPost::class);
    }

    // /**
    //  * @return DirigeantsPost[] Returns an array of DirigeantsPost objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DirigeantsPost
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
