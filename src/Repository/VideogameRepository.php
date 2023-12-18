<?php

namespace App\Repository;

use App\Entity\Videogame;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Videogame>
 *
 * @method Videogame|null find($id, $lockMode = null, $lockVersion = null)
 * @method Videogame|null findOneBy(array $criteria, array $orderBy = null)
 * @method Videogame[]    findAll()
 * @method Videogame[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VideogameRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Videogame::class);
    }

//    /**
//     * @return Videogame[] Returns an array of Videogame objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('v.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Videogame
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
