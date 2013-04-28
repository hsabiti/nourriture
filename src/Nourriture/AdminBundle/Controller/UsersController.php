<?php

namespace Nourriture\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Nourriture\UserBundle\Form\Type\ProfileFormType, 
        Nourriture\UserBundle\Entity\User;

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

    public function editAction($id)
    {

		/*$user = $this->getDoctrine()
			->getRepository('UserBundle:User')
			->findById($id);*/
		#$form = $this->container->get('nourriture.profile.form.type');


                #$request = $this->getRequest();
                #$form->bindRequest($request);

                #if($request->getMethod()=='POST'){
		#	if($form->isValid()){
		#	}			
		#}

        return $this->render('AdminBundle:Users:users_edit.html.twig');

    }
    
    public function deleteAction(){

	return $this->render('AdminBundle:Users:users_delete.html.twig');

    }

    public function addAction()
    {

        return $this->render('AdminBundle:Users:add.html.twig');

    }
}
