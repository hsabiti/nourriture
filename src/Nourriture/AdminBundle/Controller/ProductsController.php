<?php
namespace Nourriture\AdminBundle\Controller;

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
        return $this->render('AdminBundle:Products:list.html.twig', array('products' => $products, 'filter'=>$filter));
    }

    public function addAction()
    {
        
		$product = new Product();

		$form = $this->createForm(new ProductType($this->container), $product);
		
		
		$request = $this->getRequest();
		
		if($request->getMethod()=='POST'){
			#created at
			$product->setCreated(new \DateTime(date("Y-m-d H:i:s", time())));
			$form->bindRequest($request);
		
			if($form->isValid()){
				$em = $this->getDoctrine()->getEntityManager();
				
				//$user->getProfile()->setUser($user);
				//$user->getAddress()->setUser($user);
				$em->persist($product);
		
				$em->flush();
				#print_r($_POST);die(__FILE__.__LINE__);
				$this->get('session')->getFlashbag()->add('notice', $this->get('translator')->trans('product.add_success'));
				return $this->redirect($this->generateUrl('admin_products_list'));
			}
		}

        return $this->render('AdminBundle:Products:add.html.twig', array('form'=> $form->createView()));
	//return $this->render('AdminBundle:Products:add.html.twig');
    }
  
	
}
