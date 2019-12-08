<?php

namespace App\Repository;

use App\Entity\BedInfo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method BedInfo|null find($id, $lockMode = null, $lockVersion = null)
 * @method BedInfo|null findOneBy(array $criteria, array $orderBy = null)
 * @method BedInfo[]    findAll()
 * @method BedInfo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BedInfoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BedInfo::class);
    }

    // /**
    //  * @return BedInfo[] Returns an array of BedInfo objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?BedInfo
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
