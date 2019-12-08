<?php

namespace App\Repository;

use App\Entity\EmployeeContact;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method EmployeeContact|null find($id, $lockMode = null, $lockVersion = null)
 * @method EmployeeContact|null findOneBy(array $criteria, array $orderBy = null)
 * @method EmployeeContact[]    findAll()
 * @method EmployeeContact[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EmployeeContactRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EmployeeContact::class);
    }

    // /**
    //  * @return EmployeeContact[] Returns an array of EmployeeContact objects
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
    public function findOneBySomeField($value): ?EmployeeContact
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
