<?php

namespace App\Repository;

use App\Entity\EmployeePromotion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method EmployeePromotion|null find($id, $lockMode = null, $lockVersion = null)
 * @method EmployeePromotion|null findOneBy(array $criteria, array $orderBy = null)
 * @method EmployeePromotion[]    findAll()
 * @method EmployeePromotion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EmployeePromotionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EmployeePromotion::class);
    }

    // /**
    //  * @return EmployeePromotion[] Returns an array of EmployeePromotion objects
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
    public function findOneBySomeField($value): ?EmployeePromotion
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
