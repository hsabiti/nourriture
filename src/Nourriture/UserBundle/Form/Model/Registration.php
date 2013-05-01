<?php
namespace Nourriture\UserBundle\Form\Model;

use Symfony\Component\Validator\Constraints as Assert;
use Nourriture\UserBundle\Entity\User;

class  Registration{

	/**
	 * @Assert\Type(type="Nourriture\UserBundle\Entity\User")	
	 * @Assert\Valid()
	 */
	protected $user;

	public function setUser(User $user){
		$this->user = $user;
	}
	public function getUser(){
		return $this->user;
	}
	
}
