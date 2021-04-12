<?php

namespace App\Repository;

use App\Entity\AdherantPartenaire;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AdherantPartenaire|null find($id, $lockMode = null, $lockVersion = null)
 * @method AdherantPartenaire|null findOneBy(array $criteria, array $orderBy = null)
 * @method AdherantPartenaire[]    findAll()
 * @method AdherantPartenaire[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AdherantPartenaireRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AdherantPartenaire::class);
    }

    // /**
    //  * @return AdherantPartenaire[] Returns an array of AdherantPartenaire objects
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
    public function findOneBySomeField($value): ?AdherantPartenaire
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
