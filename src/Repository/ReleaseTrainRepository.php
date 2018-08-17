<?php

namespace App\Repository;

use App\Entity\ReleaseTrain;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ReleaseTrain|null find($id, $lockMode = null, $lockVersion = null)
 * @method ReleaseTrain|null findOneBy(array $criteria, array $orderBy = null)
 * @method ReleaseTrain[]    findAll()
 * @method ReleaseTrain[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReleaseTrainRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ReleaseTrain::class);
    }

//    /**
//     * @return ReleaseTrain[] Returns an array of ReleaseTrain objects
//     */
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
    public function findOneBySomeField($value): ?ReleaseTrain
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
