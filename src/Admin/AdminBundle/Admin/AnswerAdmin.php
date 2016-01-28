<?php

namespace Admin\AdminBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use QCM\webserviceBundle\Entity\Answer;

class AnswerAdmin extends Admin
{
    public function getParentAssociationMapping()
    {
        return 'post';
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('Réponse')      
                ->add('title', null, array('label' => 'Intitulé'))
                ->add('isValid', null, array('label' => 'Réponse correcte'))
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
            ->add('title', null, array('label' => 'Intitulé'))
            ->add('isValid', null, array('label' => 'Réponse correcte'))
            ->add('question', null, array('label' => 'Lié à la question'))       
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('title', null, array('label' => 'Intitulé'))
            ->add('isValid', null, array('label' => 'Réponse correcte'))
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
            ->add('title', null, array('label' => 'Intitulé'))
            ->add('isValid', null, array('label' => 'Réponse correcte'))
            ->add('question', null, array('label' => 'Lié à la question'))        
        ;

    }
}