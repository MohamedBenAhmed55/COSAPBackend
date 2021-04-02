<?php

namespace App\Repository;

use App\Entity\HeuresTravail;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method HeuresTravail|null find($id, $lockMode = null, $lockVersion = null)
 * @method HeuresTravail|null findOneBy(array $criteria, array $orderBy = null)
 * @method HeuresTravail[]    findAll()
 * @method HeuresTravail[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HeuresTravailRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, HeuresTravail::class);
    }

    // /**
    //  * @return HeuresTravail[] Returns an array of HeuresTravail objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('h.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?HeuresTravail
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
