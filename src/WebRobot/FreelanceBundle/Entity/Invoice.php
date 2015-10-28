<?php

namespace WebRobot\FreelanceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Invoice
 *
 * @package WebRobot\FreelanceBundle\Entity
 *
 * @author Eric Dupertuis <dupertuis.eric@gmail.com>
 *
 * @ORM\Entity
 * @ORM\Table(name="invoices")
 */
class Invoice
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="float")
     */
    protected $amount;

    /**
     * @ORM\ManyToOne(targetEntity="Client", inversedBy="invoices")
     */
    protected $client;
}