<?php

namespace WebRobot\FreelanceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use WebRobot\FreelanceBundle\Entity\Session;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $unpaidSessions = $this->getDoctrine()
            ->getRepository('WebRobotFreelanceBundle:Session')
            ->getAllUnpaid();

        return $this->render('WebRobotFreelanceBundle::index.html.twig', ['unpaid' => $unpaidSessions]);
    }
}
