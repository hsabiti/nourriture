<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$collection = new RouteCollection();
$collection->add('home_homepage', new Route('/home', array(
    '_controller' => 'HomeBundle:Home:index',
)));
/*$collection->add('home_homepage', new Route('/hello/{name}', array(
    '_controller' => 'HomeBundle:Default:index',
)));
*/
return $collection;
