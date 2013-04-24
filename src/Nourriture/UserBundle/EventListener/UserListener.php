<?php
namespace Nourriture\UserBundle\EventListener;

use Symfony\Component\Security\Http\Event\InteractiveLoginEvent,
	Symfony\Component\HttpKernel\Event\GetResponseEvent,
	Symfony\Component\HttpKernel\HttpKernelInterface,
	Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class UserListener{
	
	public function __construct(UrlGeneratorInterface $router){
		print_r($router->getLocale());
		die(__FILE__.__LINE__);
	}
	public function setLocalForAuthenticatedUser(){
		die(__FILE__.__LINE__);
	}
	
}