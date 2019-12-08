<?php

namespace App\Repository;

use App\Entity\BlogAuthor;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method BlogAuthor|null find($id, $lockMode = null, $lockVersion = null)
 * @method BlogAuthor|null findOneBy(array $criteria, array $orderBy = null)
 * @method BlogAuthor[]    findAll()
 * @method BlogAuthor[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BlogAuthorRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BlogAuthor::class);
    }

    // /**
    //  * @return BlogAuthor[] Returns an array of BlogAuthor objects
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
    public function findOneBySomeField($value): ?BlogAuthor
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
