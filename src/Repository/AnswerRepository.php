<?php

namespace App\Repository;

use App\Entity\Answer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Answer|null find($id, $lockMode = null, $lockVersion = null)
 * @method Answer|null findOneBy(array $criteria, array $orderBy = null)
 * @method Answer[]    findAll()
 * @method Answer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AnswerRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Answer::class);
    }


    /**
     * @return Answer[] Returns an array of Answer objects/
    */
      public function findAllByOrder($question): array
      {
          $entityManager = $this->getEntityManager();

          $query = $entityManager->createQuery(
              'SELECT a
              FROM App\Entity\Answer a
              JOIN App\Entity\Question q
              WHERE a.question = :question
              ORDER BY a.validated DESC'

          )->setParameter('question', $question );
          return $query->execute();

      }
}
