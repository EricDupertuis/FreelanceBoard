<?php

namespace WebRobot\FreelanceBundle\Entity;

/**
 * Class Session
 *
 * @package WebRobot\FreelanceBundle\Entity
 *
 * @author Eric Dupertuis <dupertuis.eric@gmail.com>
 *
 * @ORM\Entity
 * @ORM\Table(name="sessions")
 */
class Session
{
    protected $id;

    protected $time;

    protected $paid;
}