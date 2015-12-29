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

    public function getProjectAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $project = $em->getRepository('WebRobotFreelanceBundle:Project')
            ->findOneBy([
                'id' => $id,
                'user' => $this->getUser()
            ]);

        if (!$project) {
            throw $this->createNotFoundException('Project not found');
        }

        return $project;
    }
}