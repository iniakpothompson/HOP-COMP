<?php

namespace App\Repository;

use App\Entity\BookingDetails;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method BookingDetails|null find($id, $lockMode = null, $lockVersion = null)
 * @method BookingDetails|null findOneBy(array $criteria, array $orderBy = null)
 * @method BookingDetails[]    findAll()
 * @method BookingDetails[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BookingDetailsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BookingDetails::class);
    }

    // /**
    //  * @return BookingDetails[] Returns an array of BookingDetails objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?BookingDetails
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
