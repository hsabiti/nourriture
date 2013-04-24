<?php

namespace Nourriture\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
	die('wtf ' . __FILE__.__LINE__);
        return $this->render('AdminBundle:Default:index.html.twig', array('name' => $name));
    }
}
