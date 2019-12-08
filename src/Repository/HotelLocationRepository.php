<?php

namespace App\Repository;

use App\Entity\HotelLocationDetails;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method HotelLocationDetails|null find($id, $lockMode = null, $lockVersion = null)
 * @method HotelLocationDetails|null findOneBy(array $criteria, array $orderBy = null)
 * @method HotelLocationDetails[]    findAll()
 * @method HotelLocationDetails[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HotelLocationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, HotelLocationDetails::class);
    }

    // /**
    //  * @return HotelLocationDetails[] Returns an array of HotelLocationDetails objects
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
    public function findOneBySomeField($value): ?HotelLocationDetails
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
