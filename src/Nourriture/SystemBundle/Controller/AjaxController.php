<?php

namespace Nourriture\SystemBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Nourriture\SystemBundle\Library\Library as lib,
    Nourriture\UserBundle\Entity\PostcodesAddress,
    Doctrine\Common\Util\Debug;

class AjaxController extends Controller
{

    public function indexAction()
    {
	#print_r($_POST);
	$request = $this->getRequest();
	$method	 = $request->request->get('method');

	if(!method_exists($this,$method)){
	   #throw new NotFoundHttpException("Anon Method");
	   die('anon method ' . __FILE__.__LINE__);	
	}
	$data = $request->request->all();
	

	call_user_func_array(array($this,$method), array($data));

	exit("ANON ERROR " . __FILE__.__LINE__);
        return $this->render('SystemBundle:Ajax:index.html.twig', array('name' => $name));
    }
    private function getAddressByPostcode($data){
	$postcode = $data['postcode'];
	$postcode = preg_replace('/\s+/','',$postcode);

        $addresses = $this->getDoctrine()
                        ->getRepository('UserBundle:PostcodesAddress')
                        ->findByPostcode($postcode);

	#var_dump($postcode);
        #var_dump($addresses);

	$addresses = lib::getInstance()->formatAddresses($addresses);
	print_r($addresses);
	die();
    }
}
