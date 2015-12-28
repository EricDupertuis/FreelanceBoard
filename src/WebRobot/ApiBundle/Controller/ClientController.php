<?php

namespace WebRobot\ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use WebRobot\FreelanceBundle\Entity\Client;

class ClientController extends Controller
{
    public function getClientsAction(Request $request)
    {

    }

    public function getClientAction($id)
    {

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
}