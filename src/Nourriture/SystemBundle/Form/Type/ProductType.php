<?php
namespace Nourriture\SystemBundle\Form\Type;

use Symfony\Component\Form\Extension\Core\Type\LanguageType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\DependencyInjection\ContainerInterface as Container;

class  ProductType extends AbstractType{
	
	private $container = null;

        public function __construct(Container $container){
                $this->container = $container;
        }

	public function buildForm(FormBuilderInterface $builder, array $options){

		//add our custom fields

		$builder->add('name', 'text', array('label' => 'products.name','attr' => array('class'=>'postcode')))
			->add('description', 'textarea', array('label' => 'products.description','attr'=>array('class'=>'description')))
			->add('available_on', 'datetime', array('label' => 'products.available_on','attr'=>array('class'=>'available_on')))
			->add('updated', null, array('attr'=>array('class'=>'hidden'),'data'=>new \DateTime(date("Y-m-d H:i:s",time()))))
			->add('netweight', 'choice', array('choices'=>$this->container->getParameter('nourriture_weights'),'attr'=>array('class'=>'netweight')));
			//->add('town', 'text', array('attr'=>array('class'=>'town')))
			//->add('state', 'text', array('required'=>false,'attr'=>array('class'=>'state')))
			//->add('country', 'country', array('preferred_choices'=>$this->container->getParameter('nourriture_countries'),'attr'=>array('class'=>'country')));
			


	}


	public function getName(){
		
		return 'nourriture_systembundle_product';

	}
	
	public function setDefaultOptions(OptionsResolverInterface $resolver)
        {

                $resolver->setDefaults(array(
                        'data_class'	 =>  'Nourriture\SystemBundle\Entity\Product'
                ));
        }

	
	
}
