<?php

namespace App\Repository;

use App\Entity\ImageData;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ImageData|null find($id, $lockMode = null, $lockVersion = null)
 * @method ImageData|null findOneBy(array $criteria, array $orderBy = null)
 * @method ImageData[]    findAll()
 * @method ImageData[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ImageDataRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ImageData::class);
    }

    // /**
    //  * @return ImageData[] Returns an array of ImageData objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ImageData
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
