<?php

namespace WebRobot\FreelanceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

class Invoice
{
    protected $id;

    protected $amount;

    protected $client;
}