<?php

namespace WebRobot\FreelanceBundle\Repository;

use Doctrine\ORM\EntityRepository;

class ClientRepository extends EntityRepository
{

    public function getAllClients($user)
    {
        $qb = $this->_em->createQueryBuilder('c')
            ->select('c')
            ->from('WebRobotFreelanceBundle:Client', 'c')
            ->innerJoin('WebRobotFreelanceBundle:Project', 'p')
            ->where('c.user = :user')
            ->setParameter('user', $user)
        ;

        return $qb->getQuery()->getResult();

    }

}