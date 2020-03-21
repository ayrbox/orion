<?php

namespace App\Repository;

use App\Entity\ReserveBloodStatus;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method ReserveBloodStatus|null find($id, $lockMode = null, $lockVersion = null)
 * @method ReserveBloodStatus|null findOneBy(array $criteria, array $orderBy = null)
 * @method ReserveBloodStatus[]    findAll()
 * @method ReserveBloodStatus[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReserveBloodStatusRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ReserveBloodStatus::class);
    }

    // /**
    //  * @return ReserveBloodStatus[] Returns an array of ReserveBloodStatus objects
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
    public function findOneBySomeField($value): ?ReserveBloodStatus
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
