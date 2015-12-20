<?php
namespace FreelanceBundle\Entity;
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
 * @ORM\Entity(repositoryClass="WebRobot\FreelanceBundle\Repository\ClientRepository")
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
     * @ORM\OneToMany(targetEntity="Contact", mappedBy="client")
     */
    protected $contacts;
    /**
     * @ORM\OneToMany(targetEntity="Invoice", mappedBy="client")
     */
    protected $invoices;
    /**
     * @ORM\OneToMany(targetEntity="Project", mappedBy="client")
     */
    protected $projects;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->contacts = new \Doctrine\Common\Collections\ArrayCollection();
        $this->invoices = new \Doctrine\Common\Collections\ArrayCollection();
        $this->projects = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Client
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
     * Set phone
     *
     * @param string $phone
     *
     * @return Client
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
        return $this;
    }
    /**
     * Get phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }
    /**
     * Set email
     *
     * @param string $email
     *
     * @return Client
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }
    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }
    /**
     * Add contact
     *
     * @param \WebRobot\FreelanceBundle\Entity\Contact $contact
     *
     * @return Client
     */
    public function addContact(\WebRobot\FreelanceBundle\Entity\Contact $contact)
    {
        $this->contacts[] = $contact;
        return $this;
    }
    /**
     * Remove contact
     *
     * @param \WebRobot\FreelanceBundle\Entity\Contact $contact
     */
    public function removeContact(\WebRobot\FreelanceBundle\Entity\Contact $contact)
    {
        $this->contacts->removeElement($contact);
    }
    /**
     * Get contacts
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getContacts()
    {
        return $this->contacts;
    }
    /**
     * Add invoice
     *
     * @param \WebRobot\FreelanceBundle\Entity\Invoice $invoice
     *
     * @return Client
     */
    public function addInvoice(\WebRobot\FreelanceBundle\Entity\Invoice $invoice)
    {
        $this->invoices[] = $invoice;
        return $this;
    }
    /**
     * Remove invoice
     *
     * @param \WebRobot\FreelanceBundle\Entity\Invoice $invoice
     */
    public function removeInvoice(\WebRobot\FreelanceBundle\Entity\Invoice $invoice)
    {
        $this->invoices->removeElement($invoice);
    }
    /**
     * Get invoices
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getInvoices()
    {
        return $this->invoices;
    }
    /**
     * Add project
     *
     * @param \WebRobot\FreelanceBundle\Entity\Project $project
     *
     * @return Client
     */
    public function addProject(\WebRobot\FreelanceBundle\Entity\Project $project)
    {
        $this->projects[] = $project;
        return $this;
    }
    /**
     * Remove project
     *
     * @param \WebRobot\FreelanceBundle\Entity\Project $project
     */
    public function removeProject(\WebRobot\FreelanceBundle\Entity\Project $project)
    {
        $this->projects->removeElement($project);
    }
    /**
     * Get projects
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProjects()
    {
        return $this->projects;
    }
    public function __toString()
    {
        return strval($this->name);
    }
}
