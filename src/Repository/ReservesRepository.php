<?php

namespace App\Repository;

use App\Entity\Reserves;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Reserves|null find($id, $lockMode = null, $lockVersion = null)
 * @method Reserves|null findOneBy(array $criteria, array $orderBy = null)
 * @method Reserves[]    findAll()
 * @method Reserves[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReservesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Reserves::class);
    }

    // /**
    //  * @return Reserves[] Returns an array of Reserves objects
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
    public function findOneBySomeField($value): ?Reserves
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
