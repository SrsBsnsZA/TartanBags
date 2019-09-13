<?php

namespace App\Repository;

use App\Entity\UserHasRole;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method UserHasRole|null find($id, $lockMode = null, $lockVersion = null)
 * @method UserHasRole|null findOneBy(array $criteria, array $orderBy = null)
 * @method UserHasRole[]    findAll()
 * @method UserHasRole[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserHasRoleRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, UserHasRole::class);
    }

    // /**
    //  * @return UserHasRole[] Returns an array of UserHasRole objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?UserHasRole
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
