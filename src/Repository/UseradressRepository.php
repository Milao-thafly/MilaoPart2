<?php

namespace App\Repository;

use App\Entity\Useradress;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Useradress>
 *
 * @method Useradress|null find($id, $lockMode = null, $lockVersion = null)
 * @method Useradress|null findOneBy(array $criteria, array $orderBy = null)
 * @method Useradress[]    findAll()
 * @method Useradress[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UseradressRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Useradress::class);
    }

//    /**
//     * @return Useradress[] Returns an array of Useradress objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('u.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Useradress
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
