<?php

namespace App\Repository;

use App\Entity\GuestOrCustomer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method GuestOrCustomer|null find($id, $lockMode = null, $lockVersion = null)
 * @method GuestOrCustomer|null findOneBy(array $criteria, array $orderBy = null)
 * @method GuestOrCustomer[]    findAll()
 * @method GuestOrCustomer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GuestOrCustomerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, GuestOrCustomer::class);
    }

    // /**
    //  * @return GuestOrCustomer[] Returns an array of GuestOrCustomer objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?GuestOrCustomer
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
