<?php
namespace Nourriture\UserBundle\Form\Type;

use Symfony\Component\Form\Extension\Core\Type\LanguageType;

use  Symfony\Component\Form\FormBuilderInterface,
     FOS\UserBundle\Form\Type\ProfileFormType as BaseType;

class  ProfileFormType extends BaseType{
	
	public $choices = array();

	public function buildForm(FormBuilderInterface $builder, array $options){
		parent::buildForm($builder, $options);

#$this->container->getParameter('roger.admin.languages', null);		

#		print_r(\Symfony\Component\Locale\Locale::getDisplayLanguages(\Symfony\Component\Locale\Locale::getDefault()));
#die(__FILE__ . __LINE__);

		//add our custom fields
		$builder->add('locale', new LanguageType());

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



	}


	public function getName(){
		
		return 'nourriture_user_profile';

	}
	
	public function getDefaultOptions(array $options)
    {
        return array(
            'languages' => array('fr_FR', 'en_GB'),
            'csrf_protection' => false,
        );
    }
	
}
