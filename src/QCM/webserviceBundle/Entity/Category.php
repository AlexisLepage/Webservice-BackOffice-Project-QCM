<?php

namespace QCM\webserviceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Category
 *
 * @ORM\Table(name="category")
 * @ORM\Entity(repositoryClass="QCM\webserviceBundle\Repository\CategoryRepository")
 */
class Category
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
     * @ORM\Column(name="name", type="string", length=50)
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
     * @ORM\Column(name="update_at", type="datetime")
     */
    private $updateAt;

    /**
     * @ORM\OneToMany(targetEntity="QCM\webserviceBundle\Entity\Qcm", mappedBy="category", cascade={"remove"})
     */
    private $qcms;

    public function __construct()
    {
        $this->createdAt = new \Datetime();
        $this->updateAt = new \Datetime();
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
     * @return Category
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
     * @return Category
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = new \DateTime();

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
     * Set updateAt
     *
     * @param \DateTime $updateAt
     *
     * @return Category
     */
    public function setUpdateAt($updateAt)
    {
        $this->updateAt = new \DateTime();

        return $this;
    }

    /**
     * Get updateAt
     *
     * @return \DateTime
     */
    public function getUpdateAt()
    {
        return $this->updateAt;
    }

    /**
     * Add qcm
     *
     * @param \QCM\webserviceBundle\Entity\Qcm $qcm
     *
     * @return Category
     */
    public function addQcm(\QCM\webserviceBundle\Entity\Qcm $qcm)
    {
        $this->qcms[] = $qcm;

        return $this;
    }

    /**
     * Remove qcm
     *
     * @param \QCM\webserviceBundle\Entity\Qcm $qcm
     */
    public function removeQcm(\QCM\webserviceBundle\Entity\Qcm $qcm)
    {
        $this->qcms->removeElement($qcm);
    }

    /**
     * Get qcms
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getQcms()
    {
        return $this->qcms;
    }

    public function __toString()
    {
        return (string) $this->getName();
    }
}
