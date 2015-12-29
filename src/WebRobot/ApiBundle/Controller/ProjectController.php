<?php

namespace WebRobot\ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use WebRobot\FreelanceBundle\Entity\Project;

class ProjectController extends Controller
{
    public function getProjectsAction()
    {
        $em = $this->getDoctrine()->getManager();

        $projects = $em->getRepository('WebRobotFreelanceBundle:Project')
            ->findBy(['user' => $this->getUser()]);

        if (!$projects) {
            throw $this->createNotFoundException('No projects found');
        }

        return $projects;
    }
}