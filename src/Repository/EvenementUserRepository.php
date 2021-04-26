<?php

namespace App\Repository;

use App\Entity\EvenementUser;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method EvenementUser|null find($id, $lockMode = null, $lockVersion = null)
 * @method EvenementUser|null findOneBy(array $criteria, array $orderBy = null)
 * @method EvenementUser[]    findAll()
 * @method EvenementUser[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EvenementUserRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EvenementUser::class);
    }

    // /**
    //  * @return EvenementUser[] Returns an array of EvenementUser objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?EvenementUser
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
