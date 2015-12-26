<?php

namespace WebRobot\FreelanceBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ProjectsController extends FOSRestController
{

    /**
     * @Route("/all", name="get_all_projects")
     */
    public function getAllAction()
    {
        $projects = $this->container->get('doctrine.orm.entity_manager')
            ->getRepository('WebRobotFreelanceBundle:Project')
            ->findAll();

        $view = $this->view($projects, 200);

        return $this->handleView($view);
    }

    public function getProject($id)
    {
        return $this->container->get('doctrine.orm.entity_manager')
            ->getRepository('WebRobotFreelanceBundle:Project')
            ->find($id);
    }
}