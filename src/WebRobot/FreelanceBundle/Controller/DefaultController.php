<?php

namespace WebRobot\FreelanceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('WebRobotFreelanceBundle::index.html.twig');
    }
}
