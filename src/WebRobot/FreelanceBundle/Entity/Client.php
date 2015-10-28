<?php

namespace WebRobot\FreelanceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Client Client entry in database
 *
 * @package WebRobot\FreelanceBundle\Entity
 *
 * @author Eric Dupertuis <dupertuis.eric@gmail.com>
 *
 * @ORM\Entity
 * @ORM\Table(name="clients")
 */
class Client
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
     * @ORM\Column(type="string")
     */
    protected $phone;

    /**
     * @ORM\Column(type="string")
     */
    protected $email;

    /**
     * @ORM\OneToMany(targetEntity="Contact", mappedBy="client")
     */
    protected $contacts;

    /**
     * @ORM\OneToMany(targetEntity="Invoice", mappedBy="client")
     */
    protected $invoices;
}