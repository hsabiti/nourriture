<?php

namespace Nourriture\HomeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{
    public function indexAction($name=null)
    {
    	$request = $this->getRequest();
    	
    	$locale = $request->getLocale();
    	#print_r($request);
    	#print_r($locale);
    	#die(__FILE__.__LINE__);
        return $this->render('HomeBundle:Home:index.html.twig', array('name' => $name));
    }
}
