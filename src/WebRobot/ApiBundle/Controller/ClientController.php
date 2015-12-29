<?php

namespace WebRobot\ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use WebRobot\FreelanceBundle\Entity\Client;

class ClientController extends Controller
{
    public function getClientsAction()
    {
        $em = $this->getDoctrine()->getManager();

        $clients = $em->getRepository('WebRobotFreelanceBundle:Client')
            ->findBy(['user' => $this->getUser()]);

        if (!$clients) {
            throw $this->createNotFoundException('No clients found :(');
        }

        return $clients;
    }

    public function getClientAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $client = $em->getRepository('WebRobotFreelanceBundle:Client')
            ->findOneBy(['id' => $id, 'user' => $this->getUser()]);

        if (!$client) {
            throw $this->createNotFoundException('Client doesn\'t exists or doesn\'t belong to this user');
        }

        return $client;
    }

    /**
     * @param Request $request
     * @return Response|Client
     */
    public function putClientAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $check = $em->getRepository('WebRobotFreelanceBundle:Client')
            ->findOneBy([
                'name' => $request->get('name'),
                'user' => $this->getUser()
            ]);

        if (!$check) {
            $client = new Client();
            $client->setName($request->get('name'));
            $client->setUser($this->getUser());

            $em->persist($client);
            $em->flush();

            return $client;
        }

        $response = new Response('The client already exists', Response::HTTP_ACCEPTED);

        return $response;
    }

    public function postClientAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $client = $em->getRepository('WebRobotFreelanceBundle:Client')
            ->findOneBy([
                'id' => $request->get('id'),
                'user' => $this->getUser()
            ]);

        if (!$client) {
            throw $this->createNotFoundException('No client found, weird....');
        }

        $client->setName($request->get('name'));
        $em->persist($client);
        $em->flush();

        return $client;
    }

    public function deleteClientAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $client = $em->getRepository('WebRobotFreelanceBundle:Client')
            ->findOneBy([
                'id' => $request->get('id'),
                'user' => $this->getUser()
            ]);

        if (!$client) {
            throw $this->createNotFoundException('No client to delete there, Are you drunk ?');
        }

        $em->remove($client);
        $em->flush();

        return true;
    }
}