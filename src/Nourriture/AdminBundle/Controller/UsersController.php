<?php

namespace Nourriture\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UsersController extends Controller
{
    
    public function listAction()
    {

	 $users = $this->getDoctrine()
                        ->getRepository('UserBundle:User')
                        ->findByRole('ROLE_USER');
	#var_dump($users);
	#die(__FILE__.__LINE__);
        return $this->render('AdminBundle:Users:users_list.html.twig', array('users' => $users));
    }

    public function editAction()
    {

        return $this->render('AdminBundle:Users:edit.html.twig');

    }

    public function addAction()
    {

        return $this->render('AdminBundle:Users:add.html.twig');

    }
}
