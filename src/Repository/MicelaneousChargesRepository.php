<?php

namespace App\Repository;

use App\Entity\MicelaneousCharges;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method MicelaneousCharges|null find($id, $lockMode = null, $lockVersion = null)
 * @method MicelaneousCharges|null findOneBy(array $criteria, array $orderBy = null)
 * @method MicelaneousCharges[]    findAll()
 * @method MicelaneousCharges[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MicelaneousChargesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MicelaneousCharges::class);
    }

    // /**
    //  * @return MicelaneousCharges[] Returns an array of MicelaneousCharges objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?MicelaneousCharges
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
