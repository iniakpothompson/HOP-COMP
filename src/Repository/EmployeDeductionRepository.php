<?php

namespace App\Repository;

use App\Entity\EmployeeDeduction;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method EmployeeDeduction|null find($id, $lockMode = null, $lockVersion = null)
 * @method EmployeeDeduction|null findOneBy(array $criteria, array $orderBy = null)
 * @method EmployeeDeduction[]    findAll()
 * @method EmployeeDeduction[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EmployeDeductionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EmployeeDeduction::class);
    }

    // /**
    //  * @return EmployeeDeduction[] Returns an array of EmployeeDeduction objects
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
    public function findOneBySomeField($value): ?EmployeeDeduction
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
