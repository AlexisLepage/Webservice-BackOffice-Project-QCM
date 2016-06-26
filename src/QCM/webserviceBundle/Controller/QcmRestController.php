<?php
namespace QCM\webserviceBundle\Controller;

use FOS\RestBundle\Controller\Annotations\View;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\Response;
use QCM\webserviceBundle\Entity\Qcm;

class QcmRestController extends Controller
{
  public function updateQcmAction()
  {
    $request = $this->getRequest();

    //$jsonSource = '{"qcm":{"id":1,"name":"Les Fragments test","questions":[{"id":1,"title":"Ceci est la question de test numéro 1 ?","value":2,"answers":[{"id":1,"title":"Oui test","is_valid":false,"is_selected":false},{"id":2,"title":"Non test","is_valid":false,"is_selected":false}]},{"id":6,"title":"Quelle heure est-il à New York en ce moment ?","value":1,"answers":[{"id":10,"title":"+ 4 heures.","is_valid":false,"is_selected":false},{"id":11,"title":"+ 6 heures.","is_valid":false,"is_selected":false},{"id":12,"title":"+ 8 heures.","is_valid":false,"is_selected":false},{"id":13,"title":"+ 10 heures.","is_valid":false,"is_selected":false}]},{"id":7,"title":"On va voir si toutes les question s\'insèrent","value":2},{"id":8,"title":"Test test TEST testtt ?","value":1},{"id":9,"title":"Le bouclage des questions fonctionne t-il correctement ?","value":5,"answers":[{"id":14,"title":"Oui","is_valid":false,"is_selected":false},{"id":15,"title":"Presque","is_valid":false,"is_selected":false},{"id":16,"title":"Non","is_valid":false,"is_selected":false}]}]},"user":{"id":1}}';

    //$json = '{"nom":"Adriana", "naissance":"1981-06-12"}';
    //$json = $request->request->get('json');
    //$qcm = json_decode($json);

    //echo $qcm->nom. ' ' . $qcm->naissance;

    //Mettre la note + mettre is_taken a true


    $response = new Response();
    $response->setContent('OK');
    return $response;
  }
}