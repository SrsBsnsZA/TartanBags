<?php

namespace App\Repository;

use App\Entity\Trophies;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Trophies|null find($id, $lockMode = null, $lockVersion = null)
 * @method Trophies|null findOneBy(array $criteria, array $orderBy = null)
 * @method Trophies[]    findAll()
 * @method Trophies[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TrophiesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Trophies::class);
    }

    // /**
    //  * @return Trophies[] Returns an array of Trophies objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Trophies
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
