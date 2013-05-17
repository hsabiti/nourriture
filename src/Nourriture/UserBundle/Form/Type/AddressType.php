<?php
namespace Nourriture\UserBundle\Form\Type;

use Symfony\Component\Form\Extension\Core\Type\LanguageType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\DependencyInjection\ContainerInterface as Container;

class  AddressType extends AbstractType{
	
	private $container = null;

        public function __construct(Container $container){
                $this->container = $container;
        }

	public function buildForm(FormBuilderInterface $builder, array $options){

		//add our custom fields

		$builder->add('postcode', 'text', array('attr' => array('class'=>'postcode')))
			->add('firstline', 'text', array(/*'empty_value'=>'kk',*/ 'attr'=>array('class'=>'firstline')))
			->add('secondline', 'text', array('attr'=>array('class'=>'secondline')))
			->add('thirdline', 'text', array('required'=>false,'attr'=>array('class'=>'thirdline')))
			->add('town', 'text', array('attr'=>array('class'=>'town')))
			->add('state', 'text', array('required'=>false,'attr'=>array('class'=>'state')))
			->add('country', 'country', array('preferred_choices'=>$this->container->getParameter('nourriture_countries'),'attr'=>array('class'=>'country')));
			


	}


	public function getName(){
		
		return 'nourriture_userbundle_address';

	}
	
	public function setDefaultOptions(OptionsResolverInterface $resolver)
        {

                $resolver->setDefaults(array(
                        'data_class'	 =>  'Nourriture\UserBundle\Entity\Address'
                ));
        }

	
	
}
