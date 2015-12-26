<?php

namespace WebRobot\ApiBundle\Controller;

use FOS\RestBundle\Controller\Annotations\View;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class ProjectController extends Controller
{
    public function getAllAction(){
        $project = $this->getDoctrine()->getRepository('WebRobotFreelanceBundle:Project')->findAll();
        if(!is_object($project)){
            throw $this->createNotFoundException();
        }
        return $project;
    }
}