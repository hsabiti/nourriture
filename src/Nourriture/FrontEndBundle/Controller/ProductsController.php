<?php

namespace Nourriture\FrontEndBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller,
    Nourriture\SystemBundle\Entity\Product,
    Nourriture\SystemBundle\Form\Type\ProductType,
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
	#Debug::dump($products);
	#die(__FILE__.__LINE__);
        return $this->render('FrontEndBundle:Products:list.html.twig', array('products' => $products, 'filter'=>$filter));
    }

}
