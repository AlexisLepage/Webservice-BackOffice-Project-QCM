<?php

namespace Admin\AdminBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use QCM\webserviceBundle\Entity\GroupUser;

class GroupUserAdmin extends Admin
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
            ->add('users', null, array('label' => 'Utilisateurs qui appartiennet au groupe'))      
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('name', null, array('label' => 'Nom'))
            ->add('users', null, array('label' => 'Utilisateurs qui appartiennet au groupe'))        
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
            ->add('users', null, array('label' => 'Utilisateurs qui appartiennet au groupe'))      
        ;

    }

     public function preUpdate($group_user) {
        $group_user->setUpdateAt();
    }
}