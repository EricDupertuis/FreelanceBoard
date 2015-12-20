<?php
namespace FreelanceBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * Class Contact
 *
 * @package WebRobot\FreelanceBundle\Entity
 *
 * @author Eric Dupertuis <dupertuis.eric@gmail.com>
 *
 * @ORM\Entity
 * @ORM\Table(name="contacts")
 * @ORM\Entity(repositoryClass="WebRobot\FreelanceBundle\Repository\ContactRepository")
 */
class Contact
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
    protected $fullName;
    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $phone;
    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $email;
    /**
     * @ORM\Column(type="string")
     */
    protected $language;
    /**
     * @ORM\Column(type="text", nullable=true)
     */
    protected $notes;
    /**
     * @ORM\ManyToOne(targetEntity="Client", inversedBy="contacts")
     */
    protected $client;
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
     * Set fullName
     *
     * @param string $fullName
     *
     * @return Contact
     */
    public function setFullName($fullName)
    {
        $this->fullName = $fullName;
        return $this;
    }
    /**
     * Get fullName
     *
     * @return string
     */
    public function getFullName()
    {
        return $this->fullName;
    }
    /**
     * Set phone
     *
     * @param string $phone
     *
     * @return Contact
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
     * @return Contact
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
     * Set language
     *
     * @param string $language
     *
     * @return Contact
     */
    public function setLanguage($language)
    {
        $this->language = $language;
        return $this;
    }
    /**
     * Get language
     *
     * @return string
     */
    public function getLanguage()
    {
        return $this->language;
    }
    /**
     * Set notes
     *
     * @param string $notes
     *
     * @return Contact
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;
        return $this;
    }
    /**
     * Get notes
     *
     * @return string
     */
    public function getNotes()
    {
        return $this->notes;
    }
    /**
     * Set client
     *
     * @param \WebRobot\FreelanceBundle\Entity\Client $client
     *
     * @return Contact
     */
    public function setClient(\WebRobot\FreelanceBundle\Entity\Client $client = null)
    {
        $this->client = $client;
        return $this;
    }
    /**
     * Get client
     *
     * @return \WebRobot\FreelanceBundle\Entity\Client
     */
    public function getClient()
    {
        return $this->client;
    }
}
