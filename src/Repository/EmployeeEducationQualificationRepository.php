<?php

namespace App\Repository;

use App\Entity\EmployeeEducationalQualification;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method EmployeeEducationalQualification|null find($id, $lockMode = null, $lockVersion = null)
 * @method EmployeeEducationalQualification|null findOneBy(array $criteria, array $orderBy = null)
 * @method EmployeeEducationalQualification[]    findAll()
 * @method EmployeeEducationalQualification[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EmployeeEducationQualificationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EmployeeEducationalQualification::class);
    }

    // /**
    //  * @return EmployeeEducationalQualification[] Returns an array of EmployeeEducationalQualification objects
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
    public function findOneBySomeField($value): ?EmployeeEducationalQualification
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
