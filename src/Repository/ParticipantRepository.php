<?php

namespace App\Repository;

use App\Entity\Participant;
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

    public function nbParticipant($event_id)
    {
        $qb = $this->createQueryBuilder('nbParticipant');
        $qb -> select(count("participant.user"))
            ->from(Participant::class)
            ->where('participant.events_id = $even_id')
            ->orderBy("u.events");

    }

    public function addParticipant(int $event_id, int $user_id)
    {
        $qb = $this->createQueryBuilder('participant');

        $qb ->select("participant")
            ->innerJoin("participant.events", "events")
            ->innerJoin("participant.user", "user")
            ->add(["user.id", "event.id"]);

        $qb->setParameter("user.id", $user_id)
            ->setParameter("event.id", $event_id);

        return $qb->getQuery()->getResult();
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
