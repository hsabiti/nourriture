<?php
namespace Nourriture\UserBundle\Form\Type;

use Symfony\Component\Form\Extension\Core\Type\LanguageType;

use  Symfony\Component\Form\FormBuilderInterface,
     FOS\UserBundle\Form\Type\ProfileFormType as BaseType;

class  ProfileFormType extends BaseType{
	
	public function buildForm(FormBuilderInterface $builder, array $options){
		parent::buildForm($builder, $options);
		
		//add our custom fields
		$builder->add('locale', new LanguageType());

	}

	public function getName(){
		
		return 'nourriture_user_profile';

	}
	
}
