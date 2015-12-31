<?php

namespace WebRobot\ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use WebRobot\FreelanceBundle\Entity\Project;

class SessionController extends Controller
{
    public function getSessionAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $project = $em->getRepository('WebRobotFreelanceBundle:Project')
            ->findOneBy(['id' => $request->get('project_id')]);

        if (!$project) {
            throw $this->createNotFoundException('Error retrieving the session');
        }

        $session = $em->getRepository('WebRobotFreelanceBundle:Session')
            ->findOneBy(['id' => $request->get('session_id'), 'project' => $project]);

        if (!$session) {
            throw $this->createNotFoundException('No session found for the given project');
        }

        return $session;
    }

    public function getSessionsAction($project_id)
    {
        $em = $this->getDoctrine()->getManager();

        $project = $em->getRepository('WebRobotFreelanceBundle:Project')->findOneBy(['id' => $project_id]);

        if (!$project) {
            throw $this->createNotFoundException('Error while retrieving the sessions');
        }

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