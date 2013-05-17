<?php
namespace Nourriture\UserBundle\Form\Type;

use Symfony\Component\Form\Extension\Core\Type\LanguageType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\DependencyInjection\ContainerInterface as Container;

class  ProfileType extends AbstractType{
	
	private $container;

	public function __construct(Container $container){
                $this->container = $container;
        }


	public function buildForm(FormBuilderInterface $builder, array $options){


#		print_r(\Symfony\Component\Locale\Locale::getDisplayLanguages(\Symfony\Component\Locale\Locale::getDefault()));
#die(__FILE__ . __LINE__);

		//add our custom fields

		/*	$langs =  array('fr_FR'=>'fr_FR', 'en_GB'=>'en_GB');
		        foreach ($langs as $key=> $lang) {
            			$langs[$key] = \Locale::getDisplayName($lang);
        		}
		
			 $builder->add('locale', 'choice', array(
	            	'choices' => $langs,
            		'required' => false,
        	));*/
		
#print_r();die(__FILE__.__LINE__);
		$builder->add('locale','language', array('preferred_choices'=>$this->container->getParameter('nourriture_preferred_locales')))
			->add('firstname')
			->add('lastname')
			->add('telephone','text',array('required'=>false))
			->add('mobile');


	}


	public function getName(){
		
		return 'nourriture_userbundle_profile';

	}
	
	public function setDefaultOptions(OptionsResolverInterface $resolver)
        {

                $resolver->setDefaults(array(
                        'data_class'	 =>  'Nourriture\UserBundle\Entity\Profile'
                ));
        }

	
	
}
