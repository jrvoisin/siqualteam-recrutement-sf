<?php

namespace App\Repository;

use App\Entity\Comment;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Comment|null find($id, $lockMode = null, $lockVersion = null)
 * @method Comment|null findOneBy(array $criteria, array $orderBy = null)
 * @method Comment[]    findAll()
 * @method Comment[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CommentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Comment::class);
    }

    public function findAllowedWithAuthor($author) {
        
        return $this->createQueryBuilder("c")
            ->andWhere("c.allowed = 1")
            ->andWhere("c.allowedBy IS NOT NULL")
            ->andWhere("c.author = :author_id")
            ->setParameter('author_id', $author)
            ->getQuery()
            ->getResult()
        ;
    
    }

}
