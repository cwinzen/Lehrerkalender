<?php
/**
 * User: cheinrich
 * Date: 16.11.2015
 * Time: 12:49
 */

namespace SubjectBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;


class EducationClassRepository extends EntityRepository
{
    public function findAllOrdered()
    {
        $qb = $this->createQueryBuilder('c');

        $qb->addOrderBy('c.name');

        return $qb->getQuery()->getResult();
    }
}