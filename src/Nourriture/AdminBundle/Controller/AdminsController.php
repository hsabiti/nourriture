<?php

namespace Nourriture\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminsController extends Controller
{
    public function listAction()
    {
	$users = array('name'=>'Dummy Users place holder ' .__FILE__.__LINE__  );
        return $this->render('AdminBundle:Admins:list.html.twig', array('users' => $users));
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
