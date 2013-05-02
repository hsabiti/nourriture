<?php

namespace Nourriture\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use 
    Nourriture\UserBundle\Entity\User,
    Nourriture\UserBundle\Entity\Profile,
    Nourriture\UserBundle\Entity\Address,
    Nourriture\UserBundle\Form\Model\Registration,
    Nourriture\UserBundle\Form\Type\RegistrationType;


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

		$registration = new Registration();
		$registration->setUser($user);
		$registration->setProfile($user->getProfile());
		$registration->setAddress($user->getAddress());

		$form = $this->createForm(new RegistrationType(), $registration);

#print_r($_POST);
#var_dump($user->getAddress());
#die(__FILE__.__LINE__);

                $request = $this->getRequest();

                if($request->getMethod()=='POST'){

                	$form->bindRequest($request);
				
			if($form->isValid()){
				$em = $this->getDoctrine()->getEntityManager();
				$data = $request->request->get('nourriture_userbundle_registration');
				if(null === $user->getProfile()){
					$profile = new Profile();
					$prof	 = (OBJECT) $data['profile'];
					$profile->SetFirstName($prof->firstname);
					$profile->SetLastName($prof->lastname);
					$profile->SetMobile($prof->mobile);
					$profile->SetLocale($prof->locale);
					$user->setProfile($profile);
				}
				if(null === $user->getAddress()){
					$address = new Address();
					$addr	 = (OBJECT) $data['address'];
					$address->SetHouseNo($addr->house_no);
					$address->SetFirstLine($addr->firstline);
					$address->SetPostCode($addr->postcode);
					$user->setAddress($address);
				}
#print_r($data);
#print_r($address);
#die(__FILE__.__LINE__);
				$user->getProfile()->setUser($user);
				$user->getAddress()->setUser($user);
				$em->persist($user);

				$em->flush();
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
