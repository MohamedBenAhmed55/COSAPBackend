<?php

namespace App\Repository;

use App\Entity\ChefGroupe;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ChefGroupe|null find($id, $lockMode = null, $lockVersion = null)
 * @method ChefGroupe|null findOneBy(array $criteria, array $orderBy = null)
 * @method ChefGroupe[]    findAll()
 * @method ChefGroupe[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ChefGroupeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ChefGroupe::class);
    }

    // /**
    //  * @return ChefGroupe[] Returns an array of ChefGroupe objects
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
    public function findOneBySomeField($value): ?ChefGroupe
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
