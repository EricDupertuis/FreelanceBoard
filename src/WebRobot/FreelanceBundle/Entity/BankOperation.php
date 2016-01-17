<?php

namespace WebRobot\FreelanceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class BankOperation bank operations
 *
 * @package WebRobot\FreelanceBundle\Entity
 *
 * @author Eric Dupertuis <dupertuis.eric@gmail.com>
 *
 * @ORM\Entity
 * @ORM\Table(name="bank_operations")
 * @ORM\Entity(repositoryClass="WebRobot\FreelanceBundle\Repository\BankOperationRepository")
 */
class BankOperation
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
    protected $value;

    /**
     * @ORM\ManyToOne(targetEntity="BankAccount", inversedBy="operations")
     */
    protected $account;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $operationDate;

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
     * Set value
     *
     * @param float $value
     *
     * @return BankOperation
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return float
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set operationDate
     *
     * @param \DateTime $operationDate
     *
     * @return BankOperation
     */
    public function setOperationDate($operationDate)
    {
        $this->operationDate = $operationDate;

        return $this;
    }

    /**
     * Get operationDate
     *
     * @return \DateTime
     */
    public function getOperationDate()
    {
        return $this->operationDate;
    }

    /**
     * Set account
     *
     * @param \WebRobot\FreelanceBundle\Entity\BankAccount $account
     *
     * @return BankOperation
     */
    public function setAccount(BankAccount $account = null)
    {
        $this->account = $account;

        return $this;
    }

    /**
     * Get account
     *
     * @return \WebRobot\FreelanceBundle\Entity\BankAccount
     */
    public function getAccount()
    {
        return $this->account;
    }
}
