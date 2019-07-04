<?php

namespace App\Repository;

use App\Entity\Event;
use App\Entity\Participant;
use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Participant|null find($id, $lockMode = null, $lockVersion = null)
 * @method Participant|null findOneBy(array $criteria, array $orderBy = null)
 * @method Participant[]    findAll()
 * @method Participant[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ParticipantRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Participant::class);
    }

    // /**
    //  * @return Participant[] Returns an array of Participant objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    public function nbParticipant(int $event_id)
    {
        $qb = $this-> createQueryBuilder('participant');

        $qb->select('COUNT(p.users_id)')
            ->from(Participant::class, 'p')
            ->innerJoin(Event::class,'event')
            ->groupBy('p.events_id')
            ->where('p.events_id'=='event_id');

        $qb->setParameter("event_id", $event_id);

        $query = $qb->getQuery();

        echo $query->getDQL();
        echo $query->getResult();

        /**
         * $queryBuilder = $entityManager->createQueryBuilder();

        $queryBuilder->select('COUNT(u.id)')
        ->from(User::class, 'u');

        $query = $queryBuilder->getQuery();

        echo $query->getDQL(), "\n";
        echo $query->getSingleScalarResult();
         */

    }

    /*
    public function findOneBySomeField($value): ?Participant
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
