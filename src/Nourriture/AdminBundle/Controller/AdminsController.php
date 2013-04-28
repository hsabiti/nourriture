<?php

namespace Nourriture\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminsController extends Controller
{
    public function listAction()
    {
	
	$admins = $this->getDoctrine()
    			->getRepository('UserBundle:User')
			->findByRole('ROLE_ADMIN');
	
        return $this->render('AdminBundle:Admins:admins_list.html.twig', array('admins' => $admins));
    }

    public function addAction()
    {
        return $this->render('AdminBundle:Admins:add.html.twig');
    }
   
   public function dashboardAction()
   {
        $name = 'Henry Dashboard ' . __FILE__ . __LINE__;
        return $this->render('AdminBundle:Admins:dashboard.html.twig', array('name' => $name));
   }
	

}
