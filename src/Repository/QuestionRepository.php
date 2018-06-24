<?php

namespace App\Repository;

use App\Entity\Question;
use App\Entity\Answer;
use App\Entity\User;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Question|null find($id, $lockMode = null, $lockVersion = null)
 * @method Question|null findOneBy(array $criteria, array $orderBy = null)
 * @method Question[]    findAll()
 * @method Question[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class QuestionRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Question::class);
    }

    /**
    * @param User $user
    * @return Question[] Returns an array of Answer objects
    */

    public function findAllByUser($user)
    {
        $query = $this->createQueryBuilder('q')
            ->where('q.user = :user')
            ->setParameter('user', $user)
        ;

        return $query->getQuery()->getArrayResult();;
    }

}
