<?php
namespace Nourriture\UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;


class  RegistrationType extends AbstractType{
	

	public function buildForm(FormBuilderInterface $builder, array $options){

		//add our custom fields
		$builder
            		->add('user', new UserType())
			->add('profile', new ProfileType());
		
	}


	public function getName(){
		
		return 'nourriture_userbundle_registration';

	}
	
}
