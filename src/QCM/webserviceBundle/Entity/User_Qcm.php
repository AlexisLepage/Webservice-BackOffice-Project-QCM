<?php

namespace QCM\webserviceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Result
 *
 * @ORM\Table(name="user_qcm")
 * @ORM\Entity(repositoryClass="QCM\webserviceBundle\Repository\ResultRepository")
 */
class User_Qcm
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
     * @var float
     *
     * @ORM\Column(name="note", type="float", nullable=true)
     */
    private $note;

    /**
     * @var bool
     *
     * @ORM\Column(name="is_done", type="boolean")
     */
    private $isDone;

    /**
     * @ORM\ManyToOne(targetEntity="QCM\webserviceBundle\Entity\Qcm", inversedBy="userQcms")
     * @ORM\JoinColumn(nullable=false)
     */
    private $qcm;

    /**
     * @ORM\ManyToOne(targetEntity="QCM\webserviceBundle\Entity\User", inversedBy="userQcms")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    public function __construct()
    {
        $this->isDone = false;
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
     * Set note
     *
     * @param float $note
     *
     * @return User_Qcm
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note
     *
     * @return float
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set isDone
     *
     * @param boolean $isDone
     *
     * @return User_Qcm
     */
    public function setIsDone($isDone)
    {
        $this->isDone = $isDone;

        return $this;
    }

    /**
     * Get isDone
     *
     * @return boolean
     */
    public function getIsDone()
    {
        return $this->isDone;
    }

    /**
     * Set qcm
     *
     * @param \QCM\webserviceBundle\Entity\Qcm $qcm
     *
     * @return User_Qcm
     */
    public function setQcm(\QCM\webserviceBundle\Entity\Qcm $qcm)
    {
        $this->qcm = $qcm;

        return $this;
    }

    /**
     * Get qcm
     *
     * @return \QCM\webserviceBundle\Entity\Qcm
     */
    public function getQcm()
    {
        return $this->qcm;
    }

    /**
     * Set user
     *
     * @param \QCM\webserviceBundle\Entity\User $user
     *
     * @return User_Qcm
     */
    public function setUser(\QCM\webserviceBundle\Entity\User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \QCM\webserviceBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
}
