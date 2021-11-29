<?php

namespace App\Repository;

use App\Entity\SingleMatch;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SingleMatch|null find($id, $lockMode = null, $lockVersion = null)
 * @method SingleMatch|null findOneBy(array $criteria, array $orderBy = null)
 * @method SingleMatch[]    findAll()
 * @method SingleMatch[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SingleMatchRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SingleMatch::class);
    }

    // /**
    //  * @return SingleMatch[] Returns an array of SingleMatch objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SingleMatch
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
