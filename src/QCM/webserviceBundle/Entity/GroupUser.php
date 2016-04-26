<?php

namespace QCM\webserviceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GroupUser
 *
 * @ORM\Table(name="GroupUser")
 * @ORM\Entity(repositoryClass="QCM\webserviceBundle\Repository\GroupUserRepository")
 */
class GroupUser
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, unique=true)
     */
    private $name;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime")
     */
    private $updatedAt;

    /**
     * @ORM\OneToMany(targetEntity="QCM\webserviceBundle\Entity\User", mappedBy="group_user", cascade={"remove"})
     */
    private $users;

    public function __construct()
    {
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
     * @return GroupUser
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return GroupUser
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
     * @return GroupUser
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
     * Add user
     *
     * @param \QCM\webserviceBundle\Entity\User $user
     *
     * @return GroupUser
     */
    public function addUser(\QCM\webserviceBundle\Entity\User $user)
    {
        $this->users[] = $user;

        return $this;
    }

    /**
     * Remove user
     *
     * @param \QCM\webserviceBundle\Entity\User $user
     */
    public function removeUser(\QCM\webserviceBundle\Entity\User $user)
    {
        $this->users->removeElement($user);
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUsers()
    {
        return $this->users;
    }

    public function __toString()
    {
        return (string) $this->getName();
    }
}
