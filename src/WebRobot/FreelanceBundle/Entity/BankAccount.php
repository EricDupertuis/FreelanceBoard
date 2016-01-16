<?php

namespace WebRobot\FreelanceBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class BankAccount bank account entry in database
 *
 * @package WebRobot\FreelanceBundle\Entity
 *
 * @author Eric Dupertuis <dupertuis.eric@gmail.com>
 *
 * @ORM\Entity
 * @ORM\Table(name="bank_accounts")
 * @ORM\Entity(repositoryClass="WebRobot\FreelanceBundle\Repository\BankAccountRepository")
 */
class BankAccount
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    protected $name;

    protected $description;

    protected $operations;

    protected $value;
}