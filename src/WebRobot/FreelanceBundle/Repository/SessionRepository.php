<?php

namespace WebRobot\FreelanceBundle\Repository;

use Doctrine\ORM\EntityRepository;
use WebRobot\FreelanceBundle\Entity\User;

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

    /**
     * @param $user User
     * @return mixed
     */
    public function getUnpaidTotal($user)
    {
        $dql = 'SELECT SUM(s.time) AS total FROM WebRobot\FreelanceBundle\Entity\Session s WHERE s.user='.$user->getId();
        $total = $this->getEntityManager()
            ->createQuery($dql)
            ->getSingleScalarResult();

        return $total;
    }
}