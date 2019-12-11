<?php

namespace App\Repository;

use App\Entity\RoomPrices;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method RoomPrices|null find($id, $lockMode = null, $lockVersion = null)
 * @method RoomPrices|null findOneBy(array $criteria, array $orderBy = null)
 * @method RoomPrices[]    findAll()
 * @method RoomPrices[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RoomPricesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RoomPrices::class);
    }

    // /**
    //  * @return RoomPrices[] Returns an array of RoomPrices objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?RoomPrices
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
