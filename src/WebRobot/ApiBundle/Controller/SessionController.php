<?php

namespace WebRobot\ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use WebRobot\FreelanceBundle\Entity\Project;

class SessionController extends Controller
{
    public function getSessionAction()
    {
        $em = $this->getDoctrine()->getManager();

        $sessions = $em->getRepository('WebRobotFreelanceBundle:Session')
            ->findBy(['paid' => 0, 'user' => $this->getUser()]);

        if (!$sessions) {
            throw $this->createNotFoundException('No unpaid sessions found');
        }

        return $sessions;
    }

    public function getSessionsAction($project_id)
    {
        $em = $this->getDoctrine()->getManager();

        $sessions = $em->getRepository('WebRobotFreelanceBundle:Session')->findBy(['project' => $project]);

        if (!$sessions) {
            throw $this->createNotFoundException('No sessions found for the given project');
        }

        return $sessions;
    }

    public function postSessionAction(Request $request)
    {

    }

    public function putSessionAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
    }
}