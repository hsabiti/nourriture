<?php
namespace Nourriture\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller,
    Nourriture\UserBundle\Entity\PostcodesAddress,
    Doctrine\Common\Util\Debug;	    	

class ProductsController extends Controller
{
	public function listAction()
    {
	
	 	$request = $this->getRequest();

		$filter = null;
                if($request->getMethod()=='POST'){
			$filter = $request->request->get('filter');
		}
	
	 if($filter == null){
	 	$products = $this->getDoctrine()
                        ->getRepository('SystemBundle:Product')
                        ->findAll();
	}else{
		$products = $this->getDoctrine()
			->getRepository('SystemBundle:Product')
			->findByFilter(array('name'=>$filter,'description'=>$filter));
	}
        return $this->render('AdminBundle:Products:list.html.twig', array('products' => $products, 'filter'=>$filter));
    }

    public function addAction()
    {
        return $this->render('AdminBundle:Products:add.html.twig');
    }
  
	
}
