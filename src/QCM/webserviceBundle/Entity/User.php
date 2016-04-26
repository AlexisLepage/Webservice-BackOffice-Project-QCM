<?php

namespace QCM\webserviceBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;
use JMS\Serializer\Annotation\Groups;
use JMS\Serializer\Annotation\VirtualProperty;

/**
 * User
 *
 * @ORM\Table(name="fos_user")
 * @ORM\Entity(repositoryClass="QCM\webserviceBundle\Repository\UserRepository")
 *
 * @ExclusionPolicy("all") 
 */
class User extends BaseUser
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Expose
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=50)
     * @Expose
     */
    protected $name;

    /**
     * @var string
     *
     * @ORM\Column(name="firstname", type="string", length=50)
     * @Expose
     */
    protected $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="role", type="string", length=50, nullable=true)
     */
    protected $role;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     * @Expose
     */
    protected $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime")
     * @Expose
     */
    protected $updatedAt;

    /**
     * @ORM\ManyToOne(targetEntity="QCM\webserviceBundle\Entity\GroupUser", inversedBy="users")
     * @ORM\JoinColumn(nullable=true)
     */
    protected $group_user;

    /**
     * @ORM\OneToMany(targetEntity="QCM\webserviceBundle\Entity\User_Qcm", mappedBy="user", cascade={"remove"})
     * @Expose
     */
    protected $userQcms;

    public function __construct()
    {
        parent::__construct();
        $this->createdAt = new \Datetime();
        $this->updatedAt = new \Datetime();
    }

    /**
     * Get id
     *
     * @return int
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
     * @return User
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
     * Set firstname
     *
     * @param string $firstname
     *
     * @return User
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return User
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = new \Datetime();

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return User
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = new \Datetime();

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }


    /**
     * Set groupUser
     *
     * @param \QCM\webserviceBundle\Entity\GroupUser $groupUser
     *
     * @return User
     */
    public function setGroupUser(\QCM\webserviceBundle\Entity\GroupUser $groupUser)
    {
        $this->group_user = $groupUser;

        return $this;
    }

    /**
     * Get groupUser
     *
     * @return \QCM\webserviceBundle\Entity\GroupUser
     */
    public function getGroupUser()
    {
        return $this->group_user;
    }

    /**
     * Add userQcm
     *
     * @param \QCM\webserviceBundle\Entity\User_Qcm $userQcm
     *
     * @return User
     */
    public function addUserQcm(\QCM\webserviceBundle\Entity\User_Qcm $userQcm)
    {
        $this->userQcms[] = $userQcm;

        return $this;
    }

    /**
     * Remove userQcm
     *
     * @param \QCM\webserviceBundle\Entity\User_Qcm $userQcm
     */
    public function removeUserQcm(\QCM\webserviceBundle\Entity\User_Qcm $userQcm)
    {
        $this->userQcms->removeElement($userQcm);
    }

    /**
     * Get userQcms
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUserQcms()
    {
        return $this->userQcms;
    }

    public function __toString()
    {
        return $this->getFirstname() . ' ' . $this->getUsername();
    }

    /**
     * Set role
     *
     * @param string $role
     *
     * @return User
     */
    public function setRole($role)
    {
        $this->roles = $role;
        return $this;
    }

    /**
     * Get role
     *
     * @return string
     */
    public function getRole()
    {
        return $this->role;
    }
}
