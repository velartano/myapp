<?php

namespace App\Repository;

use App\Entity\Favoris;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Favoris>
 *
 * @method Favoris|null find($id, $lockMode = null, $lockVersion = null)
 * @method Favoris|null findOneBy(array $criteria, array $orderBy = null)
 * @method Favoris[]    findAll()
 * @method Favoris[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FavorisRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Favoris::class);
    }

    public function add(Favoris $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Favoris $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }
    public function countByFav()
    {
        $queryBuilder = $this->createQueryBuilder('d');
        $queryBuilder->select('COUNT(d.id) as value');

        return $queryBuilder->getQuery()->getOneOrNullResult();
    }

    public function findBiens(): array
    {
        return $this->createQueryBuilder('fav')
            ->select('fav.id_bien')
            ->getQuery()
            ->getResult();
    }

    public function findByDepartements(): array
    {
        $departements = $this->createQueryBuilder('bien')
            ->select('DISTINCT bien.codePostal')
            ->getQuery()
            ->getResult();
        // dd($departements);

        $biensParDep = [];
        foreach ($departements as $dep) {
            $biensParDep[$dep["codePostal"]] = $this->createQueryBuilder('bien')
                ->select('bien')
                ->where('bien.codePostal = ' . $dep["codePostal"])
                ->getQuery()
                ->getResult();
        }
        return $biensParDep;
    }

    //    /**
    //     * @return Favoris[] Returns an array of Favoris objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('f')
    //            ->andWhere('f.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('f.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Favoris
    //    {
    //        return $this->createQueryBuilder('f')
    //            ->andWhere('f.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
