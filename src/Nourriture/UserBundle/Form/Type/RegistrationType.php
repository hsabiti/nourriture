<?php
# Used for Admins to edit Users
namespace Nourriture\UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class  RegistrationType extends AbstractType{
	

	public function buildForm(FormBuilderInterface $builder, array $options){

		//add our custom fields
		$builder
            		->add('user',    new UserType())
			->add('profile', new ProfileType())
			->add('address', new AddressType());
		
	}


	public function getName(){
		
		return 'nourriture_userbundle_registration';

	}
	public function setDefaultOptions(OptionsResolverInterface $resolver){
		$resolver->setDefaults(array(
			'csrf_protection' => false
		));
	}
}
