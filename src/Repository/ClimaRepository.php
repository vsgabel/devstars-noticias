<?php

namespace App\Repository;

use App\Entity\Clima;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Clima>
 *
 * @method Clima|null find($id, $lockMode = null, $lockVersion = null)
 * @method Clima|null findOneBy(array $criteria, array $orderBy = null)
 * @method Clima[]    findAll()
 * @method Clima[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ClimaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Clima::class);
    }


    public function findLast(): Clima
    {
        $q = $this->createQueryBuilder('c')
                  ->orderBy('c.id', 'DESC')
                  ->setMaxResults(1)
                  ->getQuery()
                  ->getResult();
        return $q[0];
    }
//    /**
//     * @return Clima[] Returns an array of Clima objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Clima
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
