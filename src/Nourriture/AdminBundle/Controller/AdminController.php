<?php

namespace Nourriture\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminController extends Controller
{
    public function indexAction()
    {
	$name = 'Henry Admin ' . __FILE__ . __LINE__;
        return $this->render('AdminBundle:Admin:index.html.twig', array('name' => $name));
    }
 
    public function dashboardAction()
    {
	$name = 'Henry Dashboard ' . __FILE__ . __LINE__;
        return $this->render('AdminBundle:Admin:dashboard.html.twig', array('name' => $name));
    }

    public function productsAction()
    {
	$name = 'Henry Products ' . __FILE__ . __LINE__;
        return $this->render('AdminBundle:Admin:products.html.twig', array('name' => $name));
    }

    public function helloAction()
    {
	$name = 'Henry Products ' . __FILE__ . __LINE__;
        return $this->render('AdminBundle:Admin:products.html.twig', array('name' => $name));
    }

    public function fineAction()
    {
	$name = 'Henry Products ' . __FILE__ . __LINE__;
        return $this->render('AdminBundle:Admin:products.html.twig', array('name' => $name));
    }
}
