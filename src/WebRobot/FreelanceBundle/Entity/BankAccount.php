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

    /**
     * @ORM\Column(type="string")
     */
    protected $name;

    /**
     * @ORM\Column(type="string")
     */
    protected $description;

    /**
     * @ORM\OneToMany(targetEntity="BankOperation", mappedBy="account")
     */
    protected $operations;

    /**
     * @ORM\Column(type="float")
     */
    protected $value;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="bankAccounts")
     */
    protected $user;
    /**
     * Constructor
     */

    public function __construct()
    {
        $this->operations = new ArrayCollection();
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
     * @return BankAccount
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
     * @return BankAccount
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
     * Set value
     *
     * @param float $value
     *
     * @return BankAccount
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
     * Add operation
     *
     * @param \WebRobot\FreelanceBundle\Entity\BankOperation $operation
     *
     * @return BankAccount
     */
    public function addOperation(\WebRobot\FreelanceBundle\Entity\BankOperation $operation)
    {
        $this->operations[] = $operation;

        return $this;
    }

    /**
     * Remove operation
     *
     * @param \WebRobot\FreelanceBundle\Entity\BankOperation $operation
     */
    public function removeOperation(\WebRobot\FreelanceBundle\Entity\BankOperation $operation)
    {
        $this->operations->removeElement($operation);
    }

    /**
     * Get operations
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getOperations()
    {
        return $this->operations;
    }

    /**
     * Set user
     *
     * @param \WebRobot\FreelanceBundle\Entity\User $user
     *
     * @return BankAccount
     */
    public function setUser(\WebRobot\FreelanceBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \WebRobot\FreelanceBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
}
