<?php

namespace App\Repository;

use App\Entity\AttractionLocations;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method AttractionLocations|null find($id, $lockMode = null, $lockVersion = null)
 * @method AttractionLocations|null findOneBy(array $criteria, array $orderBy = null)
 * @method AttractionLocations[]    findAll()
 * @method AttractionLocations[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AttractionLocationsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AttractionLocations::class);
    }

    // /**
    //  * @return AttractionLocations[] Returns an array of AttractionLocations objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?AttractionLocations
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
