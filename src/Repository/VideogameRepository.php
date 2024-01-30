<?php

namespace App\Repository;

use App\Entity\Videogame;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class VideogameRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Videogame::class);
    }

    public function findByName(string $name): ?Videogame
    {
        return $this->createQueryBuilder('vg')
            ->andWhere('vg.name = :name')
            ->setParameter('name', $name)
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function findByID(int $id): ?Videogame
    {
        return $this->createQueryBuilder('vg')
            ->andWhere('vg.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function findAll(): array
    {
        return $this->createQueryBuilder('vg')
            ->getQuery()
            ->getResult();
    }

    

}
