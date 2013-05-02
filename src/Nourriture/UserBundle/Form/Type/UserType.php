<?php
namespace Nourriture\UserBundle\Form\Type;

use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;

use  Symfony\Component\Form\FormBuilderInterface,
     FOS\UserBundle\Form\Type\ProfileFormType as BaseType;


class  UserType extends BaseType{

	public function __construct(){
	}
	public function buildForm(FormBuilderInterface $builder, array $options){

		parent::buildForm($builder, $options);
		//add our custom fields
		/*$builder
            		->add('username', null, array('label' => 'form.username', 'translation_domain' => 'Nourriture'))
            		->add('email', 'email', array('label' => 'form.email', 'translation_domain' => 'Nourriture'));
		*/
		
		$builder->remove('current_password');
		
		//$builder->add('profile');
		//$builder->add('profile', new ProfileType());
		
		

	}


	public function getName(){
		
		return 'nourriture_userbundle_user';

	}
	
	public function setDefaultOptions(OptionsResolverInterface $resolver)
        {
        
	 	$resolver->setDefaults(array(
            		'data_class' 		=> 'Nourriture\UserBundle\Entity\User'
        	));
       }
	
}
