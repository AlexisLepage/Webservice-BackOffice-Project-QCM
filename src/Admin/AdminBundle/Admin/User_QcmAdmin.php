<?php

namespace Admin\AdminBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use QCM\webserviceBundle\Entity\User_Qcm;

class User_QcmAdmin extends Admin
{
    public function getParentAssociationMapping()
    {
        return 'post';
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper       
            ->add('user', null, array('label' => 'Utilisateur'))
            ->add('qcm', null, array('label' => 'Questionnaire'))     
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('user', null, array('label' => 'Utilisateur'))
            ->add('qcm', null, array('label' => 'Questionnaire'))
            ->add('note', null, array('label' => 'Note'))
            ->add('isDone', null, array('label' => 'a été fait'))
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('user', null, array('label' => 'Utilisateur'))
            ->add('qcm', null, array('label' => 'Questionnaire'))
            ->add('note', null, array('label' => 'Note')) 
            ->add('isDone', null, array('label' => 'a été fait'))       
            # Action sur l'objet
            ->add('_action', 'actions', array(
                'actions' => array(
                    'view' => array(),
                    'delete' => array(),
                    'edit' => array(),
                )
            ))
        ;
    }

    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('user', null, array('label' => 'Utilisateur'))
            ->add('qcm', null, array('label' => 'Questionnaire'))
            ->add('note', null, array('label' => 'Note')) 
            ->add('isDone', null, array('label' => 'a été fait'))      
        ;

    }
}