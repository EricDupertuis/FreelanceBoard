<?php

namespace WebRobot\FreelanceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use WebRobot\FreelanceBundle\Entity\Project;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $projects = $em->getRepository('WebRobotFreelanceBundle:Project')
            ->findBy(['user' => $this->getUser()]);

        $total = $em->getRepository('WebRobotFreelanceBundle:Session')
            ->getUnpaidTotal($this->getUser());

        return $this->render(
            'WebRobotFreelanceBundle::index.html.twig',
            ['projects' => $projects, 'total' => $total]
        );
    }
}
