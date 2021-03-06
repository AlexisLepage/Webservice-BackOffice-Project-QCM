<?php

namespace QCM\webserviceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Media
 *
 * @ORM\Table(name="media")
 * @ORM\Entity(repositoryClass="QCM\webserviceBundle\Repository\MediaRepository")
 */
class Media
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
     * @Assert\File()
     */
    public $file;

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
     * @ORM\ManyToOne(targetEntity="QCM\webserviceBundle\Entity\Question", inversedBy="medias")
     * @ORM\JoinColumn(nullable=false)
     */
    private $question;

    /**
     * @ORM\ManyToOne(targetEntity="QCM\webserviceBundle\Entity\TypeMedia", inversedBy="medias")
     * @ORM\JoinColumn(nullable=true)
     */
    private $typeMedia;

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
     * @return Media
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
     * @return Media
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
     * @return Media
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
     * Set question
     *
     * @param \QCM\webserviceBundle\Entity\Question $question
     *
     * @return Media
     */
    public function setQuestion(\QCM\webserviceBundle\Entity\Question $question)
    {
        $this->question = $question;

        return $this;
    }

    /**
     * Get question
     *
     * @return \QCM\webserviceBundle\Entity\Question
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * Set typeMedia
     *
     * @param \QCM\webserviceBundle\Entity\TypeMedia $typeMedia
     *
     * @return Media
     */
    public function setTypeMedia(\QCM\webserviceBundle\Entity\TypeMedia $typeMedia = null)
    {
        $this->typeMedia = $typeMedia;

        return $this;
    }

    /**
     * Get typeMedia
     *
     * @return \QCM\webserviceBundle\Entity\TypeMedia
     */
    public function getTypeMedia()
    {
        return $this->typeMedia;
    }

    public function __toString()
    {
        return (string) $this->getName();
    }


// Méthode pour l'enregistrement des fichiers téléchargés.

    public function getWebPath()
    {
        return null === $this->name ? null : $this->getUploadDir().'/'.$this->name;
    }

    protected function getUploadRootDir(Media $media)
    {
        // le chemin absolu du répertoire dans lequel sauvegarder les photos de profil
        return __DIR__.'/../../../../web/uploads/'.$this->getUploadDir($media);
    }

    protected function getUploadDir(Media $media)
    {
        //Le fichier de destination dépends du type de média.
        return  $media->getTypeMedia()->getName();   
    }

     public function uploadMediaAdmin(Media $media)
    {
        // Nous utilisons le nom de fichier original, donc il est dans la pratique 
        // nécessaire de le nettoyer pour éviter les problèmes de sécurité

        // move copie le fichier présent chez le client dans le répertoire indiqué.
        $this->name->move($this->getUploadRootDir($media), $this->name->getClientOriginalName());

        // On sauvegarde le nom de fichier
        $this->name = $this->name->getClientOriginalName();
        
    }
}
