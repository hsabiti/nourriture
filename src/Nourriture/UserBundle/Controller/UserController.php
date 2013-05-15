<?php

namespace Nourriture\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller,
    Nourriture\UserBundle\Entity\User,
    Nourriture\UserBundle\Entity\Profile,
    Nourriture\UserBundle\Entity\Address,
    Nourriture\UserBundle\Form\Model\Registration,
    Nourriture\UserBundle\Form\Type\RegistrationType,
    Nourriture\UserBundle\Form\Type\RegistrationFormType;

use FOS\UserBundle\FOSUserEvents;
use FOS\UserBundle\Event\FormEvent;
use Symfony\Component\HttpFoundation\RedirectResponse;
use FOS\UserBundle\Event\FilterUserResponseEvent;

class UserController extends Controller
{

    public function registerAction()
    {
		#user registered, redirect to profile
		if($this->get('security.context')->isGranted('IS_AUTHENTICATED_FULLY')){
			return $this->redirect($this->generateUrl('fos_user_profile_edit'));
		}

		


		$form = $this->createForm(new RegistrationFormType(new User()));
	
		$request = $this->getRequest();

		$userManager = $this->get('fos_user.user_manager');
		$dispatcher = $this->get('event_dispatcher');
		$user = $userManager->createUser();
	        $user->setEnabled(true);
		$form->setData($user);

		 if($request->getMethod()=='POST'){

                        $form->bindRequest($request);
                                
            if($form->isValid()){

				$data = $request->request->get('nourriture_userbundle_registration');
			
				$event = new FormEvent($form, $request);
		                $dispatcher->dispatch(FOSUserEvents::REGISTRATION_SUCCESS, $event);
		                $userManager->updateUser($user);
				if (null === $response = $event->getResponse()) {
                		    $url = $this->container->get('router')->generate('home_homepage');
		                    $response = new RedirectResponse($url);
                }

		        $dispatcher->dispatch(FOSUserEvents::REGISTRATION_COMPLETED, new FilterUserResponseEvent($user, $request, $response));

                return $response;
			}
		}



	return $this->render('UserBundle:Users:register.html.twig', array('form'=>$form->createView()));

    }
}
