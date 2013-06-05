<?php

namespace Nourriture\FrontEndBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class FrontEndController extends Controller
{
    public function indexAction()
    {
	$name = __FILE__ . __LINE__;
        return $this->render('FrontEndBundle:Home:index.html.twig', array('name'=>$name));

    }
}
