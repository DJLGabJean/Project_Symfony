<?php

namespace App\Repository;

use DateTimeImmutable;
use App\Entity\Settings;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Settings>
 *
 * @method Settings|null find($id, $lockMode = null, $lockVersion = null)
 * @method Settings|null findOneBy(array $criteria, array $orderBy = null)
 * @method Settings[]    findAll()
 * @method Settings[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SettingsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Settings::class);
    }


    public function findByDateString($searchDateString)
    {
        $searchDate = DateTimeImmutable::createFromFormat('d-m-Y', $searchDateString);

        if ($searchDate === false) {
            throw new \InvalidArgumentException('Format de date invalide.');
        }

        return $this->createQueryBuilder('e')
            ->andWhere('e.date = :searchDate')
            ->setParameter('searchDate', $searchDate)
            ->getQuery()
            ->getResult();
    }

    public function findByID($id)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getOneOrNullResult();
    }
}
