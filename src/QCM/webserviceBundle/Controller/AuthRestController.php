<?php
namespace QCM\webserviceBundle\Controller;

use FOS\RestBundle\Controller\Annotations\View;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\Finder\Finder;
use FOS\RestBundle\Controller\FOSRestController;

class AuthRestController extends Controller
{

    const USERNAME = "username";
    const PASSWORD = "password";
    const USER_REPOSITORY = "QCMwebserviceBundle:User";

 /*
   * @Rest\Post("/user/auth")
   * @return array|\QCM\webserviceBundle\Entity\User
 */
     public function postConnectionAction(){
        $factory = $this->get('security.encoder_factory');
        $json = json_decode($this->getRequest()->getContent(), true);
        $username = $this->getRequest()->get(self::USERNAME);

        $password = $this->getRequest()->get(self::PASSWORD);
        $user = $this->getDoctrine()->getRepository(self::USER_REPOSITORY)->findOneByUsername($username);

        $encoder = $factory->getEncoder($user);
        $bool = $encoder->isPasswordValid($user->getPassword(),$password,$user->getSalt());

        if($bool){
            return $user;
        }else{
            return null;
        }
     }
}