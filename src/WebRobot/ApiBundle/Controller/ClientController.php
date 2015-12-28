<?php

namespace WebRobot\ApiBundle\Controller;

use FOS\RestBundle\Controller\Annotations\View;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class ClientController extends Controller
{
    public function getAllAction()
    {
        $clients = $this->getDoctrine()->getRepository('WebRobotFreelanceBundle:Client')
            ->findAll();

        if (!is_object($clients)) {
            return false;
        }

        return $clients;

    }

}