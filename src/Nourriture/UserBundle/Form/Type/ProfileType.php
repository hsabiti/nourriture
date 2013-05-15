<?php
namespace Nourriture\UserBundle\Form\Type;

use Symfony\Component\Form\Extension\Core\Type\LanguageType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class  ProfileType extends AbstractType{
	
	public $choices = array();

	public function buildForm(FormBuilderInterface $builder, array $options){

#$this->container->getParameter('roger.admin.languages', null);		

#		print_r(\Symfony\Component\Locale\Locale::getDisplayLanguages(\Symfony\Component\Locale\Locale::getDefault()));
#die(__FILE__ . __LINE__);

		//add our custom fields
		#$builder->remove('current_password');
		#$builder->add('locale', new LanguageType());

			#$langs = $options['languages'];
		        #$langs = array_combine($langs, $langs);

			$langs =  array('fr_FR'=>'fr_FR', 'en_GB'=>'en_GB');
		        foreach ($langs as $key=> $lang) {
            			$langs[$key] = \Locale::getDisplayName($lang);
        		}
		
		 $builder->add('locale', 'choice', array(
            'choices' => $langs,
            'required' => false,
        ));
		$builder->add('firstname')
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
