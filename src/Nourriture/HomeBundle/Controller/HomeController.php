<?php

namespace Nourriture\HomeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{
    public function indexAction($name=null)
    {
    	$request = $this->getRequest();
#var_dump($request->attributes->get('_locale'));
#die(__FILE__.__LINE__);
	    	
    	$locale = $request->getLocale();
	$name = 'request_locale : ' .  $locale . ' session_locale ' . $request->get('_locale') . ' request_attributes locale ' . $request->attributes->get('_locale');


	$user =	$this->get('security.context')->getToken()->getUser();

	$name .= "  " . $user->getEmail() . " @ " . get_class($this);

	#var_dump($request->getSession()->get('_locale'));
    	#print_r($request);
    	#print_r($locale);
    	#die(__FILE__.__LINE__);
        return $this->render('HomeBundle:Home:index.html.twig', array('name' => $name));
    }
}
