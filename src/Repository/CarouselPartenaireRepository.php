<?php

namespace App\Repository;

use App\Entity\CarouselPartenaire;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CarouselPartenaire|null find($id, $lockMode = null, $lockVersion = null)
 * @method CarouselPartenaire|null findOneBy(array $criteria, array $orderBy = null)
 * @method CarouselPartenaire[]    findAll()
 * @method CarouselPartenaire[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CarouselPartenaireRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CarouselPartenaire::class);
    }

    // /**
    //  * @return CarouselPartenaire[] Returns an array of CarouselSection objects
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
    public function findOneBySomeField($value): ?CarouselPartenaire
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
