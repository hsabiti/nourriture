<?php

namespace Nourriture\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use 
    Nourriture\UserBundle\Entity\User,
    Nourriture\UserBundle\Form\AdminUserTask;

#use Nourriture\UserBundle\Form\UserType;
#use Nourriture\UserBundle\Form\Type\UserFormType;

use Nourriture\UserBundle\Form\Model\Registration;
use Nourriture\UserBundle\Form\Type\RegistrationType;


class UsersController extends Controller
{
    
    public function listAction()
    {

	 $users = $this->getDoctrine()
                        ->getRepository('UserBundle:User')
                        ->findByRole('');
	#var_dump($users);
	#die(__FILE__.__LINE__);
        return $this->render('AdminBundle:Users:users_list.html.twig', array('users' => $users));
    }

    public function editAction($id)
    {

		$user = $this->getDoctrine()
			->getRepository('UserBundle:User')
			->findOneBy(array('id'=>$id));

//var_dump($user->getEmail());die(__FILE__.__LINE__);

//var_dump($user->getId());
//die(__FILE__.__LINE__);
		 #$form = $this->createForm(new AdminUserTask(), $user);
		 #$form = $this->createForm(new AdminUserTask($user));
		
		#user form on its own
		#$form = $this->createForm(new UserFormType(), $user);
		#symfonys very own
		#$form = $this->createForm(new UserType(), $user);

		$registration = new Registration();
		$registration->setUser($user);
		$registration->setProfile($user->getProfile());

		$form = $this->createForm(new RegistrationType(), $registration);

#var_dump($user->getProfile());
#die(__FILE__.__LINE__);

                $request = $this->getRequest();

                if($request->getMethod()=='POST'){
                	$form->bindRequest($request);
			if($form->isValid()){
				$em = $this->getDoctrine()->getEntityManager();
				$data = $request->request->get('nourriture_userbundle_registration');
				if(null === $user->getProfile()){
					$profile = new Profile();
					$user->setProfile($profile);
					die(__FILE__.__LINE__);
				}
				#$user->getProfile()->setMobile($data['user']['profile']['mobile']);
				$em->persist($user);
				$user->getProfile()->setUser($user);

				$em->flush();
#				#var_dump($user->getProfile()->setLocale($request->get));
				#print_r($_POST);die(__FILE__.__LINE__);
				
				//if($user)//				
				#add a redirect to  user/admin edit depending on user perms
				return $this->redirect($this->generateUrl('admin_users_list'));
			}			
		}

        return $this->render('AdminBundle:Users:edit.html.twig', array('form'=>$form->createView()));

    }
    
    public function deleteAction(){

	return $this->render('AdminBundle:Users:users_delete.html.twig');

    }

    public function addAction()
    {

        return $this->render('AdminBundle:Users:add.html.twig');

    }
}
