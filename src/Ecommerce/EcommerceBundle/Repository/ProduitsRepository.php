<?php

namespace Ecommerce\EcommerceBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * ProduitsRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ProduitsRepository extends EntityRepository
{
    public function byCategorie($categorie)
    {
        $qb = $this->createQueryBuilder('u')
                ->select('u')
                ->where('u.categorie = :categorie')
                ->andWhere('u.disponible = 1')
                ->orderBy('u.id')
                ->setParameter('categorie', $categorie);
        return $qb->getQuery()->getResult();
    } 
}
