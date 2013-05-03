<?php
namespace Nourriture\UserBundle\EventListener;

use Symfony\Component\Security\Http\Event\InteractiveLoginEvent,
	Symfony\Component\HttpKernel\Event\GetResponseEvent,
	Symfony\Component\HttpKernel\HttpKernelInterface,
	Symfony\Component\Routing\Generator\UrlGeneratorInterface,
	Symfony\Component\Security\Core\SecurityContext;

class UserListener{
	
	private $router;
	private $context;
	
	public function __construct(UrlGeneratorInterface $router, SecurityContext $context){
		$this->router  = $router;
		$this->context = $context;
		#var_dump($this->user->getToken());
		#die(__FILE__.__LINE__);
	}
	
	public function getuser(){
		return $this->context->getToken()->getUser();
	}
	public function onSecurityInteractiveLogin(InteractiveLoginEvent $event){
		die(__FILE__.__LINE__);
	}
	public function _setLocalForAuthenticatedUser(){
		die(__FILE__.__LINE__);
	}
	
	/**
	* kernel.request event. If a guest user doesn't have an opened session, locale is equal to
	* "undefined" as configured by default in parameters.ini. If so, set as a locale the user's
	* preferred language.
	*
	* @param \Symfony\Component\HttpKernel\Event\GetResponseEvent $event
	*/
	public function setLocaleForUnauthenticatedUser(GetResponseEvent $event){


		/*if (HttpKernelInterface::MASTER_REQUEST !== $event->getRequestType()) {

			return;
		}*/

		#$user = $event->getAuthenticationToken()->getUser();

		#var_dump($user->getLocale());

		$request = $event->getRequest();
		if ('undefined' == $request->getLocale()) {
		die(__FILE__.__LINE__);
		  $request->setLocale($request->getPreferredLanguage());
		}
	}

	public function setLocaleForUser(GetResponseEvent $event){

	   if(HttpKernelInterface::MASTER_REQUEST !== $event->getRequestType()) {

			return;
	   }
	   if($event->getRequest()->getRequestFormat() !='html'){
	   	 return;
	   }
		$user = $this->getUser();

#var_dump($user->getProfile()->getLocale());
#die(__FILE__.__LINE__);

#var_dump($user);
#var_dump($event->getRequest()->getSession());
if(is_object($user) && $user->getProfile()->getLocale() !=null){
$event->getRequest()->setLocale($user->getProfile()->getLocale());
$event->getRequest()->getSession()->set('_locale', $user->getProfile()->getLocale());
$event->getRequest()->attributes->set('_locale', $user->getProfile()->getLocale());
}else{
	if ('undefined' == $event->getRequest()->getLocale()) {
		$event->getRequest()->setLocale($request->getPreferredLanguage());
	}
}
		
	}

		/**
	* security.interactive_login event. If a user chose a locale in preferences, it would be set,
	* if not, a locale that was set by setLocaleForUnauthenticatedUser remains.
	*
	* @param \Symfony\Component\Security\Http\Event\InteractiveLoginEvent $event
	*/
	public function setLocaleForAuthenticatedUser(InteractiveLoginEvent $event)
	{
		/*if (HttpKernelInterface::MASTER_REQUEST !== $event->getRequestType()) {
		die(__FILE__.__LINE__);

 			return;
		}*/

		/** @var \Application\Sonata\UserBundle\Entity\User $user */
		$user = $event->getAuthenticationToken()->getUser();

		#var_dump($event->getRouter());
		#die(__FILE__.__LINE__);

		 
		if ($user->getLocale()) {
			$event->getRequest()->setLocale($user->getLocale());
			$event->getRequest()->getSession()->set('_locale', $user->getLocale());
			#$this->router->getContext()->setParameter('_locale', $user->getLocale());
		}

		#print $this->router->getContext()->getParameter('_locale');
		#print $event->getRequest()->getParameter('_locale');
		#var_dump($event->getRequest()->getLocale());
		# var_dump($event->getRequest()->getSession()->get('_locale'));
		#die(__FILE__.__LINE__);
	}
	
}
