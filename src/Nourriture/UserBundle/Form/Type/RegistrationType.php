<?php
# Used for Admins to edit Users
namespace Nourriture\UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\DependencyInjection\ContainerInterface as Container;

class  RegistrationType extends AbstractType{
	private $container = null;

	public function __construct(Container $container){
		$this->container = $container;
	}
	public function buildForm(FormBuilderInterface $builder, array $options){

		//add our custom fields
		$builder
            		->add('user',    new UserType())
			->add('profile', new ProfileType($this->container))
			->add('address', new AddressType($this->container));
		
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
