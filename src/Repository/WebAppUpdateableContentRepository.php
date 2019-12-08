<?php

namespace App\Repository;

use App\Entity\WebAppUpdateableContent;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method WebAppUpdateableContent|null find($id, $lockMode = null, $lockVersion = null)
 * @method WebAppUpdateableContent|null findOneBy(array $criteria, array $orderBy = null)
 * @method WebAppUpdateableContent[]    findAll()
 * @method WebAppUpdateableContent[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WebAppUpdateableContentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, WebAppUpdateableContent::class);
    }

    // /**
    //  * @return WebAppUpdateableContent[] Returns an array of WebAppUpdateableContent objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('w.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?WebAppUpdateableContent
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
