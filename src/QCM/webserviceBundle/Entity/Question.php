<?php

namespace QCM\webserviceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Question
 *
 * @ORM\Table(name="question")
 * @ORM\Entity(repositoryClass="QCM\webserviceBundle\Repository\QuestionRepository")
 */
class Question
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
     * @ORM\Column(name="title", type="text")
     */
    private $title;

    /**
     * @var int
     *
     * @ORM\Column(name="value", type="integer")
     */
    private $value;

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
     * @ORM\ManyToOne(targetEntity="QCM\webserviceBundle\Entity\Qcm", inversedBy="questions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $qcm;

    /**
     * @ORM\OneToMany(targetEntity="QCM\webserviceBundle\Entity\Answer", mappedBy="question", cascade={"remove"})
     */
    private $answers;

    /**
     * @ORM\OneToMany(targetEntity="QCM\webserviceBundle\Entity\Media", mappedBy="question", cascade={"remove"})
     */
    private $medias;

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
     * Set title
     *
     * @param string $title
     *
     * @return Question
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set value
     *
     * @param integer $value
     *
     * @return Question
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return int
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Question
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
     * @return Question
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
     * Set qcm
     *
     * @param \QCM\webserviceBundle\Entity\Qcm $qcm
     *
     * @return Question
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
     * Add answer
     *
     * @param \QCM\webserviceBundle\Entity\Answer $answer
     *
     * @return Question
     */
    public function addAnswer(\QCM\webserviceBundle\Entity\Answer $answer)
    {
        $this->answers[] = $answer;

        return $this;
    }

    /**
     * Remove answer
     *
     * @param \QCM\webserviceBundle\Entity\Answer $answer
     */
    public function removeAnswer(\QCM\webserviceBundle\Entity\Answer $answer)
    {
        $this->answers->removeElement($answer);
    }

    /**
     * Get answers
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAnswers()
    {
        return $this->answers;
    }

    /**
     * Add media
     *
     * @param \QCM\webserviceBundle\Entity\Media $media
     *
     * @return Question
     */
    public function addMedia(\QCM\webserviceBundle\Entity\Media $media)
    {
        $this->medias[] = $media;

        return $this;
    }

    /**
     * Remove media
     *
     * @param \QCM\webserviceBundle\Entity\Media $media
     */
    public function removeMedia(\QCM\webserviceBundle\Entity\Media $media)
    {
        $this->medias->removeElement($media);
    }

    /**
     * Get medias
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMedias()
    {
        return $this->medias;
    }

    public function __toString()
    {
        return (string) $this->getTitle();
    }
}
