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

    public function putProjectAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $check = $em->getRepository('WebRobotFreelanceBundle:Project')
            ->findOneBy([
                'name' => $request->get('name'),
                'user' => $this->getUser()
            ]);

        if (!$check) {
            $project = new Project();

            $client = $em->getRepository('WebRobotFreelanceBundle:Client')
                ->findOneBy(['id' => $request->get('client_id')]);

            if (!$client) {
                throw $this->createNotFoundException('Something went wrong while retrieving the client');
            }

            $project->setName($request->get('name'));
            $project->setDescription($request->get('description'));
            $project->setUser($this->getUser());
            $project->setClient($client);

            $em->persist($client);
            $em->flush();

            return $client;
        }

        $response = new Response('The project already exists', Response::HTTP_ACCEPTED);

        return $response;
    }

    public function postProjectAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $project = $em->getRepository('WebRobotFreelanceBundle:Project')
            ->findOneBy([
                'id' => $request->get('id'),
                'user' => $this->getUser()
            ]);

        if (!$project) {

        }
    }
}