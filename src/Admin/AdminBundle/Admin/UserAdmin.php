<?php

namespace Admin\AdminBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use QCM\webserviceBundle\Entity\User;

class UserAdmin extends Admin
{
    public function getParentAssociationMapping()
    {
        return 'post';
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        $role_type = array(
            'ROLE_USER' => 'Utilisateur',
            'ROLE_ADMIN' => 'Administrateur'
        );

        $formMapper
            ->with('Utilisateur')       
                ->add('username', null, array('label' => 'Username'))
                ->add('name', null, array('label' => 'Nom'))
                ->add('firstname', null, array('label' => 'Prénom'))
                ->add('email', null, array('label' => 'Email'))
                ->add('plainPassword', 'repeated', array(
                    'type' => 'password',
                    'options' => array('translation_domain' => 'FOSUserBundle'),
                    'first_options' => array('label' => 'form.password'),
                    'second_options' => array('label' => 'form.password_confirmation'),
                    'invalid_message' => 'fos_user.password.mismatch',))
            ->end()
            ->with('Rôle')
                ->add('roles', null , array('label' => 'Role (Pour créer un administrateur, mettre "ROLE_ADMIN")'))
                ->add('enabled', null, array('label' => 'Accès au BackOffice'))
            ->end()
            ->with('Groupe')
                ->add('group_user', null, array('label' => 'Appartient au groupe'))
            ->end()
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('username', null, array('label' => 'Username'))
            ->add('name', null, array('label' => 'Nom'))
            ->add('firstname', null, array('label' => 'Prénom'))
            ->add('email', null, array('label' => 'Email'))
            ->add('password', null, array('label' => 'Mot de passe'))
            ->add('roles', null, array('label' => 'Rôle de l\'utilisateur'))
            ->add('enabled', null, array('label' => 'Accès au BackOffice'))
            ->add('group_user', null, array('label' => 'Appartient au groupe'))        
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('username', null, array('label' => 'Username'))
            ->add('name', null, array('label' => 'Nom'))
            ->add('firstname', null, array('label' => 'Prénom'))
            ->add('email', null, array('label' => 'Email'))
            ->add('password', null, array('label' => 'Mot de passe'))
            ->add('roles', null, array('label' => 'Rôle de l\'utilisateur'))
            ->add('enabled', null, array('label' => 'Accès au BackOffice'))
            ->add('group_user', null, array('label' => 'Appartient au groupe'))        
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
            ->add('username', null, array('label' => 'Username'))
            ->add('name', null, array('label' => 'Nom'))
            ->add('firstname', null, array('label' => 'Prénom'))
            ->add('email', null, array('label' => 'Email'))
            ->add('roles', null, array('label' => 'Rôle de l\'utilisateur'))
            ->add('group_user', null, array('label' => 'Appartient au groupe'))       
        ;

    }
}