<?php

/*
 * This file is part of the "Stylish Portfolio" project.
 * (c) Dzhezar Kadyrov <dzhezik@gmail.com>
 */

namespace App\Repository\Photoshoot;

use App\Entity\Photoshoot;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\DBAL\Connection;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method null|Photoshoot find($id, $lockMode = null, $lockVersion = null)
 * @method null|Photoshoot findOneBy(array $criteria, array $orderBy = null)
 * @method Photoshoot[]    findAll()
 * @method Photoshoot[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PhotoshootRepository extends ServiceEntityRepository implements PhotoshootRepositoryInterface
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Photoshoot::class);
    }

    public function findNumberOfPhotoshoots(int $count = null, array $category = null, array $isPosted = null)
    {
        return $this->createQueryBuilder('p')
            ->innerJoin('p.Category', 'c')
            ->addSelect('c')
            ->where('c.slug IN (:category)')
            ->andwhere('p.IsPosted IN (:isPosted)')
            ->setParameter('category', $category, Connection::PARAM_STR_ARRAY)
            ->setParameter('isPosted', $isPosted, Connection::PARAM_INT_ARRAY)
            ->setMaxResults($count)
            ->orderBy('p.PublicationDate', 'DESC')
            ->getQuery()
            ->getResult()
            ;
    }

    public function findPostedPhotoshoots()
    {
        return $this->createQueryBuilder('p')
            ->where('p.IsPosted = 1')
            ->orderBy('p.PublicationDate', 'DESC')
            ->getQuery()
            ->getResult();
    }

    public function findAllPhotoshoots()
    {
        return $this->createQueryBuilder('p')
            ->orderBy('p.PublicationDate', 'DESC')
            ->getQuery()
            ->getResult();
    }
}
