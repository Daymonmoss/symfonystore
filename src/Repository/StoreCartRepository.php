<?php

namespace App\Repository;

use App\Entity\StoreCart;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method StoreCart|null find($id, $lockMode = null, $lockVersion = null)
 * @method StoreCart|null findOneBy(array $criteria, array $orderBy = null)
 * @method StoreCart[]    findAll()
 * @method StoreCart[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StoreCartRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, StoreCart::class);
    }

    // /**
    //  * @return StoreCart[] Returns an array of StoreCart objects
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
    public function findOneBySomeField($value): ?StoreCart
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
