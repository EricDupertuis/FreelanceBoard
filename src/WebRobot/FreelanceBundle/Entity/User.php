<?php

namespace WebRobot\FreelanceBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /*
     * @ORM\Column(type="string")
     */
    protected $firstName;

    /*
     * @ORM\Column(type="string")
     */
    protected $lastName;

    /*
     * @ORM\Column(type="text")
     */
    protected $address;

    /**
     * @ORM\OneToMany(targetEntity="Client", mappedBy="user")
     */
    protected $clients;

    /**
     * @ORM\OneToMany(targetEntity="Project", mappedBy="user")
     */
    protected $projects;

    //protected $country;

    //protected $standardPricing;

    //protected $defaultCurrency;

    /**
     * User constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->clients = new ArrayCollection();
        $this->projects = new ArrayCollection();
    }

    /**
     * Add client
     *
     * @param \WebRobot\FreelanceBundle\Entity\Client $client
     *
     * @return User
     */
    public function addClient(\WebRobot\FreelanceBundle\Entity\Client $client)
    {
        $this->clients[] = $client;

        return $this;
    }

    /**
     * Remove client
     *
     * @param \WebRobot\FreelanceBundle\Entity\Client $client
     */
    public function removeClient(\WebRobot\FreelanceBundle\Entity\Client $client)
    {
        $this->clients->removeElement($client);
    }

    /**
     * Get clients
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getClients()
    {
        return $this->clients;
    }

    /**
     * Add project
     *
     * @param \WebRobot\FreelanceBundle\Entity\Project $project
     *
     * @return User
     */
    public function addProject(\WebRobot\FreelanceBundle\Entity\Project $project)
    {
        $this->projects[] = $project;

        return $this;
    }

    /**
     * Remove project
     *
     * @param \WebRobot\FreelanceBundle\Entity\Project $project
     */
    public function removeProject(\WebRobot\FreelanceBundle\Entity\Project $project)
    {
        $this->projects->removeElement($project);
    }

    /**
     * Get projects
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProjects()
    {
        return $this->projects;
    }
}
