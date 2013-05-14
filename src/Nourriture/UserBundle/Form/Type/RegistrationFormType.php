<?php
# Used for users to Register 
namespace Nourriture\UserBundle\Form\Type;

#use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormBuilderInterface;
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;

class  RegistrationFormType extends BaseType{
	
	 public function __construct($class){
        	#var_dump($class);
	        #die(__FILE__.__LINE__);
    	}  

	public function buildForm(FormBuilderInterface $builder, array $options){
		
		parent::buildForm($builder, $options);
		
		//add our custom fields
		/*$builder
            		->add('user',    new UserType())
			->add('profile', new ProfileType())
			->add('address', new AddressType());
		*/	
		//$builder->add('user');
		
	}


	public function getName(){
		
		return 'nourriture_user_registration';

	}
	
	public function setDefaultOptions(OptionsResolverInterface $resolver)
        {

                $resolver->setDefaults(array(
                        'data_class'            => 'Nourriture\UserBundle\Entity\User',
			'intention'  		=> 'registration'
                ));
       }
	
}
