<?php

namespace Admin\AdminBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use QCM\webserviceBundle\Entity\Question;

class QuestionAdmin extends Admin
{
    public function getParentAssociationMapping()
    {
        return 'post';
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper 
        ->with('Question')      
            ->add('title', null, array('label' => 'Intitulé de la question'))
            ->add('value', null, array('label' => 'Valeur en points de cette question'))
        ->end()
        ->with('QCM')
            ->add('qcm', null, array('label' => 'Qcm'))
        ->end()    
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
           ->add('title', null, array('label' => 'Intitulé de la question'))
           ->add('value', null, array('label' => 'Valeur en points de cette question'))
           ->add('qcm', null, array('label' => 'Qcm'))   
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('title', null, array('label' => 'Intitulé de la question'))
            ->add('value', null, array('label' => 'Valeur en points de cette question'))
            ->add('qcm', null, array('label' => 'Qcm'))
            ->add('answers', null, array('label' => 'Réponses associées'))
            ->add('medias', null, array('label' => 'Contient les médias')) 
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
            ->add('title', null, array('label' => 'Intitulé de la question'))
            ->add('value', null, array('label' => 'Valeur en points de cette question'))
            ->add('qcm', null, array('label' => 'Qcm'))       
        ;

    }
}