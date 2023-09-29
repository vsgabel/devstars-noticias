<?php

namespace App\Repository;

use App\Entity\Noticia;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Noticia>
 *
 * @method Noticia|null find($id, $lockMode = null, $lockVersion = null)
 * @method Noticia|null findOneBy(array $criteria, array $orderBy = null)
 * @method Noticia[]    findAll()
 * @method Noticia[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NoticiaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Noticia::class);
    }

    public function findReverse($limit = 10): array
    {
        return $this->createQueryBuilder('n')
                    ->orderBy('n.data', 'DESC')
                    ->setMaxResults($limit)
                    ->getQuery()
                    ->getResult()
            ;
    }

    public function findNoticia(string $q): array
    {
        return $this->createQueryBuilder('n')
                    ->where("n.titulo LIKE :q")
                    ->setParameter("q", "%".$q."%")
                    ->orderBy('n.data', 'DESC')
                    ->getQuery()
                    ->getResult()
            ;
    }

//    /**
//     * @return Noticia[] Returns an array of Noticia objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('n')
//            ->andWhere('n.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('n.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Noticia
//    {
//        return $this->createQueryBuilder('n')
//            ->andWhere('n.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
