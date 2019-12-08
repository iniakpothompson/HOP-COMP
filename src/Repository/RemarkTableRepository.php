<?php

namespace App\Repository;

use App\Entity\RemarkTable;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method RemarkTable|null find($id, $lockMode = null, $lockVersion = null)
 * @method RemarkTable|null findOneBy(array $criteria, array $orderBy = null)
 * @method RemarkTable[]    findAll()
 * @method RemarkTable[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RemarkTableRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RemarkTable::class);
    }

    // /**
    //  * @return RemarkTable[] Returns an array of RemarkTable objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?RemarkTable
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
