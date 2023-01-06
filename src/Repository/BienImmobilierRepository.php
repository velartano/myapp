<?php

namespace App\Repository;

use App\Entity\BienImmobilier;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<BienImmobilier>
 *
 * @method BienImmobilier|null find($id, $lockMode = null, $lockVersion = null)
 * @method BienImmobilier|null findOneBy(array $criteria, array $orderBy = null)
 * @method BienImmobilier[]    findAll()
 * @method BienImmobilier[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BienImmobilierRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BienImmobilier::class);
    }

    public function add(BienImmobilier $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(BienImmobilier $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /**
     * @return int/mixed/string
     */
    public function countAllBien()
    {
        $queryBuilder = $this->createQueryBuilder('d');
        $queryBuilder->select('COUNT(d.id) as value');

        return $queryBuilder->getQuery()->getOneOrNullResult();
    }

        public function findByCat(int $id): array
    {
        return $this->createQueryBuilder('bienByCat')
            ->select('bienByCat')
            ->where ('bienByCat.categorie = ' . $id)
            ->getQuery()
            ->getResult();
    }

    public function search(array $criteres): array
    {
        // dd($criteres);
        return $this->createQueryBuilder('bien')
            ->select('bien')
            ->where(($criteres['cat_id'] != 0) ? "bien.categorie = " . $criteres['cat_id'] : null)
            ->andWhere("bien.titre like '%" . $criteres['titre'] . "%'")
            ->andWhere(($criteres['prix'] != null) ? 'bien.prix <= ' . $criteres['prix'] : null)
            ->andWhere(($criteres['surface'] != null) ? 'bien.surface <= ' . $criteres['surface'] : null)
            // ->andWhere("bien.localisation like '%" . $criteres['localisation'] . "%'")
            ->getQuery()
            ->getResult();
    }
    //    /**
    //     * @return BienImmobilier[] Returns an array of BienImmobilier objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('b')
    //            ->andWhere('b.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('b.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?BienImmobilier
    //    {
    //        return $this->createQueryBuilder('b')
    //            ->andWhere('b.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}