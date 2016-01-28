<?php

namespace Admin\AdminBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use QCM\webserviceBundle\Entity\Qcm;

class QcmAdmin extends Admin
{
    public function getParentAssociationMapping()
    {
        return 'post';
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper   
            ->with('QCM')    
                ->add('name', null, array('label' => 'Nom'))        
                ->add('isAvailable', null, array('label' => 'Disponibilité'))
                ->add('beginningAt', null, array('label' => 'Date début disponibilité'))
                ->add('finishedAt', null, array('label' => 'Date fin disponibilité'))
                ->add('duration', null, array('label' => 'Durée après ouverture'))  
            ->end()
            ->with('Catégorie')
                ->add('category', null, array('label' => 'Catégorie'))
            ->end()
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name', null, array('label' => 'Nom'))        
            ->add('isAvailable', null, array('label' => 'Disponibilité'))
            ->add('beginningAt', null, array('label' => 'Date début disponibilité'))
            ->add('finishedAt', null, array('label' => 'Date fin disponibilité'))
            ->add('duration', null, array('label' => 'Durée après ouverture'))
            ->add('category', null, array('label' => 'Catégorie'))
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('name', null, array('label' => 'Nom'))        
            ->add('isAvailable', null, array('label' => 'Disponibilité'))
            ->add('beginningAt', null, array('label' => 'Date début disponibilité'))
            ->add('finishedAt', null, array('label' => 'Date fin disponibilité'))
            ->add('duration', null, array('label' => 'Durée après ouverture'))
            ->add('category', null, array('label' => 'Catégorie'))
            ->add('questions', null, array('label' => 'Questions associées'))

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
            ->add('isAvailable', null, array('label' => 'Disponibilité'))
            ->add('beginningAt', null, array('label' => 'Date début disponibilité'))
            ->add('finishedAt', null, array('label' => 'Date fin disponibilité'))
            ->add('duration', null, array('label' => 'Durée après ouverture'))
            ->add('category', null, array('label' => 'Catégorie'))
        ;

    }
}