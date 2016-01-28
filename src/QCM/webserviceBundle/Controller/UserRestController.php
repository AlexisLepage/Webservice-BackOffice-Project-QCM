<?php
namespace QCM\webserviceBundle\Controller;

use FOS\RestBundle\Controller\Annotations\View;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class UserRestController extends Controller
{
  public function getUsersAction(){
  	$users = $this->getDoctrine()->getRepository('QCMwebserviceBundle:User')->findAll();
  	return $users;
  }
}