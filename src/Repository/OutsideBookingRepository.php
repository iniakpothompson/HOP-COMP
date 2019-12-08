<?php

namespace App\Repository;

use App\Entity\OutsideBooking;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method OutsideBooking|null find($id, $lockMode = null, $lockVersion = null)
 * @method OutsideBooking|null findOneBy(array $criteria, array $orderBy = null)
 * @method OutsideBooking[]    findAll()
 * @method OutsideBooking[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OutsideBookingRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OutsideBooking::class);
    }

    // /**
    //  * @return OutsideBooking[] Returns an array of OutsideBooking objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?OutsideBooking
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
