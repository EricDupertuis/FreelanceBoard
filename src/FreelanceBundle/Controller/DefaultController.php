<?php

namespace FreelanceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('FreelanceBundle:Default:index.html.twig');
    }
}
