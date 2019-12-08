<?php

namespace App\Repository;

use App\Entity\AreaOfPresence;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method AreaOfPresence|null find($id, $lockMode = null, $lockVersion = null)
 * @method AreaOfPresence|null findOneBy(array $criteria, array $orderBy = null)
 * @method AreaOfPresence[]    findAll()
 * @method AreaOfPresence[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AreaOfPresenceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AreaOfPresence::class);
    }

    // /**
    //  * @return AreaOfPresence[] Returns an array of AreaOfPresence objects
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
    public function findOneBySomeField($value): ?AreaOfPresence
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
