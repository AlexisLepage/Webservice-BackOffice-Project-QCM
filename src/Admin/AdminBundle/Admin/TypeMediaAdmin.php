<?php

namespace Admin\AdminBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use QCM\webserviceBundle\Entity\TypeMedia;

class TypeMediaAdmin extends Admin
{
    public function getParentAssociationMapping()
    {
        return 'post';
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper       
            ->add('name', null, array('label' => 'Nom'))        
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name', null, array('label' => 'Nom'))
            ->add('medias', null, array('label' => 'Médias associés à ce type'))        
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('name', null, array('label' => 'Nom'))
            ->add('medias', null, array('label' => 'Médias associés à ce type'))        
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
            ->add('name', null, array('label' => 'Nom'))
            ->add('medias', null, array('label' => 'Médias associés à ce type'))      
        ;

    }

    public function prePersist($typeMedia) {
        $typeMedia->createFolderTypeMedia($typeMedia);
    }

    public function preUpdate($typeMedia) {
        $typeMedia->createFolderTypeMedia($typeMedia);
    }

}