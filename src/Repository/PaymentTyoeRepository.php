<?php

namespace App\Repository;

use App\Entity\PaymentTyoe;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method PaymentTyoe|null find($id, $lockMode = null, $lockVersion = null)
 * @method PaymentTyoe|null findOneBy(array $criteria, array $orderBy = null)
 * @method PaymentTyoe[]    findAll()
 * @method PaymentTyoe[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PaymentTyoeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, PaymentTyoe::class);
    }

    // /**
    //  * @return PaymentTyoe[] Returns an array of PaymentTyoe objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PaymentTyoe
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
