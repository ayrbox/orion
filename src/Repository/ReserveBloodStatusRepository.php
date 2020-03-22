<?php

namespace App\Repository;

use App\Entity\BloodTypes;
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
    public function searchByLocation(BloodTypes $bloodType, $location) {
        return $this->createQueryBuilder('A')
            ->select('A.id, B.name, B.address, B.contact_no, B.email, A.note')
            ->innerJoin( Reserves::class, 'B', JOIN::WITH, 'B.id = A.Reserve')
            ->where('A.bloodType = :bloodType')
            ->andWhere('B.address LIKE :location')
            ->setParameter('bloodType', $bloodType)
            ->setParameter('location', '%'.$location.'%')
            ->getQuery()
            ->getResult();
    }
}
