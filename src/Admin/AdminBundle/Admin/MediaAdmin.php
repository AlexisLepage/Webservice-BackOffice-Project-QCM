<?php

namespace Admin\AdminBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use QCM\webserviceBundle\Entity\Media;

class MediaAdmin extends Admin
{
    public function getParentAssociationMapping()
    {
        return 'post';
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('Média')     
                ->add('name', null, array('label' => 'Fichier'))
                ->add('typeMedia', null, array('label' => 'Type de média'))
            ->end()
            ->with('Question')
                ->add('question', null, array('label' => 'Lié à la question'))
            ->end()   
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name', null, array('label' => 'Fichier'))
            ->add('typeMedia', null, array('label' => 'Type de média'))
            ->add('question', null, array('label' => 'Lié à la question'))      
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('name', null, array('label' => 'Fichier'))
            ->add('typeMedia', null, array('label' => 'Type de média'))
            ->add('question', null, array('label' => 'Lié à la question'))       
            # Action sur l'objet
            ->add('_action', 'actions', array(
                'actions' => array(
                    'view' => array(),
                    'edit' => array(),
                    'delete' => array(),
                )
            ))
        ;
    }

    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('name', null, array('label' => 'Fichier'))
            ->add('typeMedia', null, array('label' => 'Type de média'))
            ->add('question', null, array('label' => 'Lié à la question'))        
        ;

    }

    public function prePersist($media) {
        $this->saveFile($media);
    }

    public function preUpdate($media) {
        $this->saveFile($media);
        $this->setUpdateAt($media->getCreatedAt);
    }

    public function saveFile($media) {
        $basepath = $this->getRequest()->getBasePath();
        $media->uploadMediaAdmin($media);
    }
}