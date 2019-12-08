<?php

namespace App\Repository;

use App\Entity\EmployeeBonus;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method EmployeeBonus|null find($id, $lockMode = null, $lockVersion = null)
 * @method EmployeeBonus|null findOneBy(array $criteria, array $orderBy = null)
 * @method EmployeeBonus[]    findAll()
 * @method EmployeeBonus[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EmployeeBonusRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EmployeeBonus::class);
    }

    // /**
    //  * @return EmployeeBonus[] Returns an array of EmployeeBonus objects
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
    public function findOneBySomeField($value): ?EmployeeBonus
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
