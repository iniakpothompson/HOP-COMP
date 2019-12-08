<?php

namespace App\Repository;

use App\Entity\EmployeeAllowance;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method EmployeeAllowance|null find($id, $lockMode = null, $lockVersion = null)
 * @method EmployeeAllowance|null findOneBy(array $criteria, array $orderBy = null)
 * @method EmployeeAllowance[]    findAll()
 * @method EmployeeAllowance[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EmployeeAllowanceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EmployeeAllowance::class);
    }

    // /**
    //  * @return EmployeeAllowance[] Returns an array of EmployeeAllowance objects
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
    public function findOneBySomeField($value): ?EmployeeAllowance
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
