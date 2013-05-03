<?php

namespace Nourriture\AdminBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Nourriture\UserBundle\Entity\User,
	Nourriture\UserBundle\Entity\Profile,
	Nourriture\UserBundle\Entity\Address,
	Nourriture\UserBundle\Form\Model\Registration,
	Nourriture\UserBundle\Form\Type\RegistrationType;

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
   public function editAction($id)
   {
   
   	$user = $this->getDoctrine()
   	->getRepository('UserBundle:User')
   	->findOneBy(array('id'=>$id));

   	$registration = new Registration();
   	$registration->setUser($user);
   	$registration->setProfile($user->getProfile());
   	$registration->setAddress($user->getAddress());
   
   	$form = $this->createForm(new RegistrationType(), $registration);
   
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
   
   			$user->getProfile()->setUser($user);
   			$user->getAddress()->setUser($user);
   			$em->persist($user);
   
   			$em->flush();
   				
   			return $this->redirect($this->generateUrl('admin_admins_list'));
   		}
   	}
   
   	return $this->render('AdminBundle:Users:edit.html.twig', array('form'=>$form->createView()));
   
   }	

}
