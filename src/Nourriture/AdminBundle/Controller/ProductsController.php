<?php

namespace Nourriture\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProductsController extends Controller
{
    public function listAction()
    {
	$products = array('name'=>'Dummy Prouducst place holder ' .__FILE__.__LINE__  );
        return $this->render('AdminBundle:Products:list.html.twig', array('products' => $products));
    }

    public function addAction()
    {
        return $this->render('AdminBundle:Products:add.html.twig');
    }
	
}
