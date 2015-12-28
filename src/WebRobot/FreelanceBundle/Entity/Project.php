<?php

namespace WebRobot\FreelanceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Project
 *
 * @package WebRobot\FreelanceBundle\Entity
 *
 * @author Eric Dupertuis <dupertuis.eric@gmail.com>
 *
 * @ORM\Table(name="projects")
 * @ORM\Entity(repositoryClass="WebRobot\FreelanceBundle\Repository\ProjectRepository")
 */
class Project
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $name;

    /**
     * @ORM\Column(type="text")
     */
    protected $description;

    /**
     * @ORM\ManyToOne(targetEntity="Client", inversedBy="projects")
     */
    protected $client;

    /**
     * @ORM\OneToMany(targetEntity="Session", mappedBy="project")
     */
    protected $sessions;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $closed;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="projects")
     */
    protected $user;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->sessions = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Project
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Project
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set closed
     *
     * @param boolean $closed
     *
     * @return Project
     */
    public function setClosed($closed)
    {
        $this->closed = $closed;

        return $this;
    }

    /**
     * Get closed
     *
     * @return boolean
     */
    public function getClosed()
    {
        return $this->closed;
    }

    /**
     * Set client
     *
     * @param \WebRobot\FreelanceBundle\Entity\Client $client
     *
     * @return Project
     */
    public function setClient(\WebRobot\FreelanceBundle\Entity\Client $client = null)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Get client
     *
     * @return \WebRobot\FreelanceBundle\Entity\Client
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Add session
     *
     * @param \WebRobot\FreelanceBundle\Entity\Session $session
     *
     * @return Project
     */
    public function addSession(\WebRobot\FreelanceBundle\Entity\Session $session)
    {
        $this->sessions[] = $session;

        return $this;
    }

    /**
     * Remove session
     *
     * @param \WebRobot\FreelanceBundle\Entity\Session $session
     */
    public function removeSession(\WebRobot\FreelanceBundle\Entity\Session $session)
    {
        $this->sessions->removeElement($session);
    }

    /**
     * Get sessions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSessions()
    {
        return $this->sessions;
    }

    public function __toString()
    {
        return strval($this->name);
    }
}
