<?php

namespace WebRobot\FreelanceBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

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

    protected $firstName;

    protected $lastName;

    protected $address;

    protected $country;

    protected $standardPricing;

    public function __construct()
    {
        parent::__construct();
    }
}
