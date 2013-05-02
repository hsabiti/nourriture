<?php
namespace Nourriture\UserBundle\Form\Type;

use Symfony\Component\Form\Extension\Core\Type\LanguageType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class  AddressType extends AbstractType{
	

	public function buildForm(FormBuilderInterface $builder, array $options){


		//add our custom fields

		$builder->add('house_no')
			->add('firstline')
			->add('postcode');


	}


	public function getName(){
		
		return 'nourriture_bundle_user_address';

	}
	
	public function setDefaultOptions(OptionsResolverInterface $resolver)
        {

                $resolver->setDefaults(array(
                        'data_class'	 =>  'Nourriture\UserBundle\Entity\Address'
                ));
        }

	
	
}
