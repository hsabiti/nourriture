<?php

namespace Nourriture\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UsersController extends Controller
{
    public function indexAction($name)
    {
	die('wtf ' . __FILE__.__LINE__);
        return $this->render('AdminBundle:Default:index.html.twig', array('name' => $name));
    }
    
    public function listAction()
    {

	$users = array('name'=>'Henry Erm....');

        return $this->render('AdminBundle:Users:list.html.twig', array('users' => $users));
    }

    public function editAction()
    {


        return $this->render('AdminBundle:Users:list.html.twig', array('users' => $users));
    }
}
