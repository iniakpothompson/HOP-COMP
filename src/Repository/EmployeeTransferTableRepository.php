<?php

namespace App\Repository;

use App\Entity\EmployeeTransferTable;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method EmployeeTransferTable|null find($id, $lockMode = null, $lockVersion = null)
 * @method EmployeeTransferTable|null findOneBy(array $criteria, array $orderBy = null)
 * @method EmployeeTransferTable[]    findAll()
 * @method EmployeeTransferTable[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EmployeeTransferTableRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EmployeeTransferTable::class);
    }

    // /**
    //  * @return EmployeeTransferTable[] Returns an array of EmployeeTransferTable objects
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
    public function findOneBySomeField($value): ?EmployeeTransferTable
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
