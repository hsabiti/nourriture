<?php
namespace Nourriture\AdminBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\DependencyInjection\ContainerAware;

class MenuBuilder extends ContainerAware
{
    private $factory;

    /**
     * @param FactoryInterface $factory
     */
    public function __construct(FactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    public function createMainMenu(Request $request)
    {

	#print_r($request->getLocale());print "\n";die(__FILE__.__LINE__);
        #$menu = $this->factory->createItem('root', array('attributes'=>array('class'=>'nav')));
        $menu = $this->factory->createItem('root');
	
	#$menu->setCurrentUri($request->getRequestUri());
	
	$menu->setChildrenAttributes(array('class'=>'nav'));

	#print_r(basename($request->getRequestUri()));die(__FILE__.__LINE__);

        $menu->addChild('home', array('label'=>'Home','route' => 'admin_homepage'));
		$menu['home']->addChild('hello', array('route'=>'admin_hello', 'attributes'=>array('class'=>'pissoff current')));
		$menu['home']->addChild('fine', array('route'=>'admin_fine', 'attributes'=>array('class'=>'pissoff current')));

		$menu['home']->setChildrenAttributes(array('class'=>'subnav'));


        $menu->addChild('dashboard', array('label'=>'Dashboard','route' => 'admin_dashboard'));
		$menu['dashboard']->addChild('hello', array('label'=>'Hello Motto', 'route'=>'admin_hello', 'attributes'=>array('class'=>'pissoff current')));
		$menu['dashboard']->addChild('fine', array('route'=>'admin_fine', 'attributes'=>array('class'=>'pissoff current')));

		$menu['dashboard']->setChildrenAttributes(array('class'=>'subnav'));

        $menu->addChild('products', array('label'=>'Products','route' => 'admin_products'));
        // ... add more children

	foreach($menu as $key=>$item){
		$item->setExtra('routes', array('routes'=>$key));
	}
	
	#var_dump($item);
	#die(__FILE__.__LINE__);
        return $menu;
    }
}

