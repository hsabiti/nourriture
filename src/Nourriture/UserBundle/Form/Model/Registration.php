<?php
namespace Nourriture\UserBundle\Form\Model;

use Symfony\Component\Validator\Constraints as Assert;
use Nourriture\UserBundle\Entity\User;
use Nourriture\UserBundle\Entity\Profile;
use Nourriture\UserBundle\Entity\Address;

class  Registration{

	/**
	 * @Assert\Type(type="Nourriture\UserBundle\Entity\User")	
	 * @Assert\Valid()
	 */
	protected $user;

	/**
         * @Assert\Type(type="Nourriture\UserBundle\Entity\Profile")       
         * @Assert\Valid()
         */
        protected $profile;

	/**
         * @Assert\Type(type="Nourriture\UserBundle\Entity\Address")       
         * @Assert\Valid()
         */
        protected $address;


	public function setUser(User $user){
		$this->user = $user;
	}
	public function getUser(){
		return $this->user;
	}
	
	public function setProfile(Profile $profile=null){
		$this->profile = $profile;
	}
	public function getProfile(){
		return $this->profile;
	}

	public function setAddress(Address $address=null){
		$this->address = $address;
	}
	public function getAddress(){
		return $this->address;
	}
	
}
