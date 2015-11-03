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


    protected $country;

    /**
     * @ORM\Column(type="integer")
     */
    protected $standardPricing;

    protected $defaultCurrency;

    public function __construct()
    {
        parent::__construct();
    }
}
