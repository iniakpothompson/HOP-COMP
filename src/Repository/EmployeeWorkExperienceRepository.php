<?php

namespace App\Repository;

use App\Entity\EmployeeWorkExperience;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method EmployeeWorkExperience|null find($id, $lockMode = null, $lockVersion = null)
 * @method EmployeeWorkExperience|null findOneBy(array $criteria, array $orderBy = null)
 * @method EmployeeWorkExperience[]    findAll()
 * @method EmployeeWorkExperience[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EmployeeWorkExperienceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EmployeeWorkExperience::class);
    }

    // /**
    //  * @return EmployeeWorkExperience[] Returns an array of EmployeeWorkExperience objects
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
    public function findOneBySomeField($value): ?EmployeeWorkExperience
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
