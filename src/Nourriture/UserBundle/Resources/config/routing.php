<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$collection = new RouteCollection();
$collection->add('user_homepage', new Route('/hello/{name}', array(
    '_controller' => 'UserBundle:Default:index',
	array('_locale'=>'en|fr')	
)));

return $collection;
