<?php

namespace WebRobot\FreelanceBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;

class ProjectsController extends FOSRestController
{
    public function getProject($id)
    {
        return $this->container->get('doctrine.orm.entity_manager')
            ->getRepository('WebRobotFreelanceBundle:Project')
            ->find($id);
    }
}