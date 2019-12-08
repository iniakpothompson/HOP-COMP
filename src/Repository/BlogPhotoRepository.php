<?php

namespace App\Repository;

use App\Entity\BlogPhoto;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method BlogPhoto|null find($id, $lockMode = null, $lockVersion = null)
 * @method BlogPhoto|null findOneBy(array $criteria, array $orderBy = null)
 * @method BlogPhoto[]    findAll()
 * @method BlogPhoto[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BlogPhotoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BlogPhoto::class);
    }

    // /**
    //  * @return BlogPhoto[] Returns an array of BlogPhoto objects
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
    public function findOneBySomeField($value): ?BlogPhoto
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
