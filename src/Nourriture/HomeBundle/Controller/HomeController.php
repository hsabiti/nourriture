<?php

namespace Nourriture\HomeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{
    public function indexAction($name=null)
    {
        return $this->render('HomeBundle:Home:index.html.twig', array('name' => $name));
    }
}
