<?php

namespace QCM\webserviceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TypeMedia
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class TypeMedia
{
    /**
     * @var integer
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
     * @ORM\OneToMany(targetEntity="QCM\webserviceBundle\Entity\Media", mappedBy="typeMedia")
     */
    private $medias;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->medias = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return TypeMedia
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
     * Add media
     *
     * @param \QCM\webserviceBundle\Entity\Media $media
     *
     * @return TypeMedia
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
        return (string) $this->getName();
    }

//Fonction pour créer un dossier avec comme nom le type du média pour les éléments téléchargés.
    
    public function createFolderTypeMedia(TypeMedia $typeMedia){
        mkdir(__DIR__.'/../../../../web/uploads/'.$typeMedia->getName(), 0777, true);
    }
}
