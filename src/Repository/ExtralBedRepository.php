<?php

namespace App\Repository;

use App\Entity\ExtralBed;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method ExtralBed|null find($id, $lockMode = null, $lockVersion = null)
 * @method ExtralBed|null findOneBy(array $criteria, array $orderBy = null)
 * @method ExtralBed[]    findAll()
 * @method ExtralBed[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExtralBedRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ExtralBed::class);
    }

    // /**
    //  * @return ExtralBed[] Returns an array of ExtralBed objects
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
    public function findOneBySomeField($value): ?ExtralBed
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
