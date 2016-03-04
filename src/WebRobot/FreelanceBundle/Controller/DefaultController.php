<?php

namespace WebRobot\FreelanceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use WebRobot\FreelanceBundle\Entity\Project;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $user = $this->getUser();

        $projects = $em->getRepository('WebRobotFreelanceBundle:Project')
            ->findBy(['user' => $user]);

        $total = $em->getRepository('WebRobotFreelanceBundle:Session')
            ->getUnpaidTotal($user);

        $clients = $em->getRepository('WebRobotFreelanceBundle:Client')
            ->findBy(['user' => $user]);

        return $this->render(
            'WebRobotFreelanceBundle::index.html.twig',
            ['projects' => $projects, 'total' => $total, 'clients' => $clients]
        );
    }
}
