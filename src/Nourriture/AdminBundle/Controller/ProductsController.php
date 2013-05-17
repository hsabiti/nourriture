<?php
namespace Nourriture\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller,
    Nourriture\UserBundle\Entity\PostcodesAddress,
    Doctrine\Common\Util\Debug;	    	

class ProductsController extends Controller
{
    public function listAction()
    {
	$postcode = 'NG31 9GB';
	$postcode = preg_replace('/\s+/','',$postcode);

	$postcodes = $this->getDoctrine()
                        ->getRepository('UserBundle:PostcodesAddress')
			->findByPostcode($postcode);

	var_dump($postcodes);
	#Debug::dump($postcodes);
	die($postcode .__FILE__.__LINE__);

	$products = array('name'=>'Dummy Prouducst place holder ' .__FILE__.__LINE__  );
        return $this->render('AdminBundle:Products:list.html.twig', array('products' => $products));
    }

    public function addAction()
    {
        return $this->render('AdminBundle:Products:add.html.twig');
    }
	
}
