<?php

namespace App\Repository;

use App\Entity\HandiCap;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method HandiCap|null find($id, $lockMode = null, $lockVersion = null)
 * @method HandiCap|null findOneBy(array $criteria, array $orderBy = null)
 * @method HandiCap[]    findAll()
 * @method HandiCap[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HandiCapRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, HandiCap::class);
    }

    // /**
    //  * @return HandiCap[] Returns an array of HandiCap objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('h.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?HandiCap
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
