<?php

namespace App\Repository;

use App\Entity\FraisHorsForfait;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method FraisHorsForfait|null find($id, $lockMode = null, $lockVersion = null)
 * @method FraisHorsForfait|null findOneBy(array $criteria, array $orderBy = null)
 * @method FraisHorsForfait[]    findAll()
 * @method FraisHorsForfait[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FraisHorsForfaitRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FraisHorsForfait::class);
    }

    // /**
    //  * @return FraisHorsForfait[] Returns an array of FraisHorsForfait objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?FraisHorsForfait
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
