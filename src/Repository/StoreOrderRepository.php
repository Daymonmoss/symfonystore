<?php

namespace App\Repository;

use App\Entity\StoreOrder;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method StoreOrder|null find($id, $lockMode = null, $lockVersion = null)
 * @method StoreOrder|null findOneBy(array $criteria, array $orderBy = null)
 * @method StoreOrder[]    findAll()
 * @method StoreOrder[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StoreOrderRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, StoreOrder::class);
    }

    // /**
    //  * @return StoreOrder[] Returns an array of StoreOrder objects
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
    public function findOneBySomeField($value): ?StoreOrder
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
