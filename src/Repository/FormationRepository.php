<?php

namespace App\Repository;

use App\Entity\Formation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Formation>
 *
 * @method Formation|null find($id, $lockMode = null, $lockVersion = null)
 * @method Formation|null findOneBy(array $criteria, array $orderBy = null)
 * @method Formation[]    findAll()
 * @method Formation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FormationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Formation::class);
    }

    public function add(Formation $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Formation $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    // /**
    //  * @return Formation[] Returns an array of Formation objects
    //  */
    // public function findUncategorizedFormation(): array
    // {
    //     // return $this->createQuery('SELECT *
    //     // FROM formation
    //     // LEFT JOIN formation_learning_category ON formation.id = formation_learning_category.formation_id
    //     // WHERE formation_learning_category.formation_id IS NULL');
    //     // $qb =  $this->createQueryBuilder("f");
    //     // return  $qb->leftJoin("f.learningCategories", "l")
    //     //     ->where("l.formations IS NULL")
    //     //     ->getQuery()
    //     //     ->getResult();
    // }

    //    public function findOneBySomeField($value): ?Formation
    //    {
    //        return $this->createQueryBuilder('f')
    //            ->andWhere('f.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }

    public function findInGoals($value)
    {

        return $this->createQueryBuilder('f')
            ->andWhere('f.goal LIKE :val OR f.name LIKE :val')
            ->setParameter('val', "%" . $value . "%")
            ->orderBy('f.id', 'ASC')
            ->getQuery()
            ->getResult();
    }
}
