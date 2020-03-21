<?php

namespace App\Repository;

use App\Entity\ReserveBloodStatus;
use App\Entity\Reserves;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\Query\Expr\Join;

/**
 * @method ReserveBloodStatus|null find($id, $lockMode = null, $lockVersion = null)
 * @method ReserveBloodStatus|null findOneBy(array $criteria, array $orderBy = null)
 * @method ReserveBloodStatus[]    findAll()
 * @method ReserveBloodStatus[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReserveBloodStatusRepository extends ServiceEntityRepository {

    public function __construct(ManagerRegistry $registry) {
        parent::__construct($registry, ReserveBloodStatus::class);
    }

    /**
     * @param $location
     * @return mixed
     */
    public function searchByLocation($location) {
        return $this->createQueryBuilder('a')
            ->select('a.Reserve')
            ->select('b.name, b.address, b.contact_no, b.email, a.note')
            ->innerJoin(
                Reserves::class,
                'b'
            )
            ->where('b.address like \'%'.$location.'%\'')
            ->getQuery()
            ->getResult();
    }
}
