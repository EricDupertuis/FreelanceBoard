<?php

namespace WebRobot\FreelanceBundle\Repository;

use Doctrine\ORM\EntityRepository;

class SessionRepository extends EntityRepository
{
    public function getAllUnpaid()
    {
        $unpaidSessions = $this->getEntityManager()
            ->getRepository('WebRobotFreelanceBundle:Session')
            ->findBy(['paid' => 0]);

        return $unpaidSessions;
    }

    public function getAllUnpaidByProject($projectId)
    {
        $unpaidSessions = $this->getEntityManager()
            ->getRepository('WebRobotFreelanceBundle:Session')
            ->findBy(['paid' => 0, 'project' => $projectId]);

        return $unpaidSessions;
    }
}