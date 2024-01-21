<?php

namespace App\Repository;

use App\Entity\Produit;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Produit>
 *
 * @method Produit|null find($id, $lockMode = null, $lockVersion = null)
 * @method Produit|null findOneBy(array $criteria, array $orderBy = null)
 * @method Produit[]    findAll()
 * @method Produit[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProduitRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Produit::class);
    }

    public function findBySousRubrique(int $sousrubrique)
    {
        return $this->createQueryBuilder('s')
            ->addSelect('s.id, s.libelle, s.photo,s.description,s.prix,s.prixHt')
            ->andWhere('s.SousRubrique = :id')
            ->setParameter('id', $sousrubrique)
            ->getQuery()
            ->getResult();
    }

    // public function findBypid(int $produit)
    // {
    //     return $this->createQueryBuilder('p')
    //         ->addSelect('p.id, p.libelle, p.photo,p.description,p.prix,p.prixHt')
    //         ->andWhere('p.id = :id')
    //         ->setParameter('id', $produit)
    //         ->getQuery()
    //         ->getResult();
    // }

//    /**
//     * @return Produit[] Returns an array of Produit objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Produit
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }

public function findOneByid(int $produit)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.id = :id')
            ->setParameter('id', $produit)
            ->getQuery()
            ->getOneOrNullResult();
    }
}

