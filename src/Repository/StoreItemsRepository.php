<?php

namespace App\Repository;

use App\Entity\StoreItems;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method StoreItems|null find($id, $lockMode = null, $lockVersion = null)
 * @method StoreItems|null findOneBy(array $criteria, array $orderBy = null)
 * @method StoreItems[]    findAll()
 * @method StoreItems[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StoreItemsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, StoreItems::class);
    }

    // /**
    //  * @return StoreItems[] Returns an array of StoreItems objects
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
    public function findOneBySomeField($value): ?StoreItems
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
