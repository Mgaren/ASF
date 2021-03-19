<?php

namespace App\Repository;

use App\Entity\ContactHoraire;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ContactHoraire|null find($id, $lockMode = null, $lockVersion = null)
 * @method ContactHoraire|null findOneBy(array $criteria, array $orderBy = null)
 * @method ContactHoraire[]    findAll()
 * @method ContactHoraire[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContactHoraireRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ContactHoraire::class);
    }

    // /**
    //  * @return ContactHoraire[] Returns an array of ContactHoraire objects
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
    public function findOneBySomeField($value): ?ContactHoraire
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
