<?php

namespace App\Repository;

use App\Entity\CancelationTable;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method CancelationTable|null find($id, $lockMode = null, $lockVersion = null)
 * @method CancelationTable|null findOneBy(array $criteria, array $orderBy = null)
 * @method CancelationTable[]    findAll()
 * @method CancelationTable[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CancelationTableRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CancelationTable::class);
    }

    // /**
    //  * @return CancelationTable[] Returns an array of CancelationTable objects
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
    public function findOneBySomeField($value): ?CancelationTable
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
