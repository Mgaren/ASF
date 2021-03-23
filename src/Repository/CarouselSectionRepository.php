<?php

namespace App\Repository;

use App\Entity\CarouselSection;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CarouselSection|null find($id, $lockMode = null, $lockVersion = null)
 * @method CarouselSection|null findOneBy(array $criteria, array $orderBy = null)
 * @method CarouselSection[]    findAll()
 * @method CarouselSection[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CarouselSectionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CarouselSection::class);
    }

    // /**
    //  * @return CarouselSection[] Returns an array of CarouselSection objects
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
    public function findOneBySomeField($value): ?CarouselSection
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
