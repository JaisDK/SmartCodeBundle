<?php

namespace SmartCodeBundle\Repository;

use Doctrine\ORM\EntityRepository;
use SmartCodeBundle\Entity\PayloadInterface;

class SmartCodeRepository extends EntityRepository
{
    public function findAllCreationGroupsForPayload(PayloadInterface $payload)
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT sc.createdAt, sc.usageLimit, sc.startsAt, sc.expiresAt, count(sc.id) as total
                 FROM SmartCodeBundle:SmartCode sc
                 WHERE sc.payload = :payload
                 GROUP BY sc.createdAt
                 ORDER BY sc.id ASC'
            )
            ->setParameter('payload', $payload)
            ->getResult();
    }

    public function findAllByCreationGroup(\DateTime $creationGroup, PayloadInterface $payload)
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT sc
                 FROM SmartCodeBundle:SmartCode sc
                 WHERE sc.createdAt = :creationGroup
                 AND sc.payload = :payload
                 ORDER BY sc.id ASC'
            )
            ->setParameter('payload', $payload)
            ->setParameter('creationGroup', $creationGroup)
            ->getResult();
    }
}