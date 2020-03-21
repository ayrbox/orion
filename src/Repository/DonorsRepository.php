<?php

namespace App\Repository;

use App\Entity\Donors;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Donors|null find($id, $lockMode = null, $lockVersion = null)
 * @method Donors|null findOneBy(array $criteria, array $orderBy = null)
 * @method Donors[]    findAll()
 * @method Donors[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DonorsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Donors::class);
    }

    // /**
    //  * @return Donors[] Returns an array of Donors objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Donors
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
