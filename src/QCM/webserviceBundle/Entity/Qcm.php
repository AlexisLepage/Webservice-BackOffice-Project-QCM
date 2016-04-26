<?php

namespace QCM\webserviceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Qcm
 *
 * @ORM\Table(name="qcm")
 * @ORM\Entity(repositoryClass="QCM\webserviceBundle\Repository\QcmRepository")
 */
class Qcm
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var bool
     *
     * @ORM\Column(name="is_available", type="boolean")
     */
    private $isAvailable;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="beginning_at", type="datetime")
     */
    private $beginningAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="finished_at", type="datetime")
     */
    private $finishedAt;

    /**
     * @var int
     *
     * @ORM\Column(name="duration", type="integer")
     */
    private $duration;

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
     * @ORM\ManyToOne(targetEntity="QCM\webserviceBundle\Entity\Category", inversedBy="qcms")
     * @ORM\JoinColumn(nullable=false)
     */
    private $category;

    /**
     * @ORM\OneToMany(targetEntity="QCM\webserviceBundle\Entity\User_Qcm", mappedBy="qcm", cascade={"remove"})
     */
    private $userQcms;

    /**
     * @ORM\OneToMany(targetEntity="QCM\webserviceBundle\Entity\Question", mappedBy="qcm", cascade={"remove"})
     */
    private $questions;

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
     * @return Qcm
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
     * Set isAvailable
     *
     * @param boolean $isAvailable
     *
     * @return Qcm
     */
    public function setIsAvailable($isAvailable)
    {
        $this->isAvailable = $isAvailable;

        return $this;
    }

    /**
     * Get isAvailable
     *
     * @return bool
     */
    public function getIsAvailable()
    {
        return $this->isAvailable;
    }

    /**
     * Set beginningAt
     *
     * @param \DateTime $beginningAt
     *
     * @return Qcm
     */
    public function setBeginningAt($beginningAt)
    {
        $this->beginningAt = $beginningAt;

        return $this;
    }

    /**
     * Get beginningAt
     *
     * @return \DateTime
     */
    public function getBeginningAt()
    {
        return $this->beginningAt;
    }

    /**
     * Set finishedAt
     *
     * @param \DateTime $finishedAt
     *
     * @return Qcm
     */
    public function setFinishedAt($finishedAt)
    {
        $this->finishedAt = $finishedAt;

        return $this;
    }

    /**
     * Get finishedAt
     *
     * @return \DateTime
     */
    public function getFinishedAt()
    {
        return $this->finishedAt;
    }

    /**
     * Set duration
     *
     * @param integer $duration
     *
     * @return Qcm
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * Get duration
     *
     * @return int
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Qcm
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
     * @return Qcm
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
     * Set category
     *
     * @param \QCM\webserviceBundle\Entity\Category $category
     *
     * @return Qcm
     */
    public function setCategory(\QCM\webserviceBundle\Entity\Category $category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \QCM\webserviceBundle\Entity\Category
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Add userQcm
     *
     * @param \QCM\webserviceBundle\Entity\User_Qcm $userQcm
     *
     * @return Qcm
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

    /**
     * Add question
     *
     * @param \QCM\webserviceBundle\Entity\Question $question
     *
     * @return Qcm
     */
    public function addQuestion(\QCM\webserviceBundle\Entity\Question $question)
    {
        $this->questions[] = $question;

        return $this;
    }

    /**
     * Remove question
     *
     * @param \QCM\webserviceBundle\Entity\Question $question
     */
    public function removeQuestion(\QCM\webserviceBundle\Entity\Question $question)
    {
        $this->questions->removeElement($question);
    }

    /**
     * Get questions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getQuestions()
    {
        return $this->questions;
    }

    public function __toString()
    {
        return (string) $this->getName();
    }
}
