<?php
namespace Nourriture\AdminBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\DependencyInjection\ContainerAware;
class MenuBuilder extends ContainerAware
{
    private $factory;
    private $translator;
    private $security;	

    /**
     * @param FactoryInterface $factory
     */
    public function __construct(FactoryInterface $factory, $translator, $security)
    {
        $this->factory      = $factory;
	$this->translator   = $translator;
	$this->security	    = $security;	
    }

    public function createMainMenu(Request $request)
    {

	$t = $this->translator;


#die(__FILE__.__LINE__);
#print $t->getLocale();
#die($t->trans('dashboard.dashboard'));
	#print_r($request->getLocale());print "\n";die(__FILE__.__LINE__);
        #$menu = $this->factory->createItem('root', array('attributes'=>array('class'=>'nav')));
        $menu = $this->factory->createItem('root');
	
	#$menu->setCurrentUri($request->getRequestUri());
	
	$menu->setChildrenAttributes(array('class'=>'nav'));

	#print_r(basename($request->getRequestUri()));die(__FILE__.__LINE__);

        $menu->addChild('dashboard', array('label'=> $t->trans('dashboard.dashboard'),'route' => 'admin_dashboard_list'));
		$menu['dashboard']->addChild('list', array('label'=>$t->trans('dashboard.list'), 'route'=>'admin_dashboard_list', 'attributes'=>array('class'=>'dashboard')));
		$menu['dashboard']->setChildrenAttributes(array('class'=>'subnav'));



        $menu->addChild('products', array('label'=>$t->trans('dashboard.products'),'route' => 'admin_products_list'));
		$menu['products']->addChild('list', array('label'=>$t->trans('dashboard.list_products'), 'route'=>'admin_products_list', 'attributes'=>array('class'=>'placeholder')));
		$menu['products']->addChild('add', array('label'=>$t->trans('dashboard.add_product'),'route'=>'admin_products_add', 'attributes'=>array('class'=>'pissoff')));

	$menu->addChild('users', array('label'=>$t->trans('dashboard.users'),'route' => 'admin_users_list'));
		$menu['users']->addChild('users', array('label'=>$t->trans('dashboard.list_users'), 'route'=>'admin_users_list', 'attributes'=>array('class'=>'users')));
		$menu['users']->addChild('add', array('label'=>$t->trans('dashboard.add_user'), 'route'=>'admin_users_add', 'attributes'=>array('class'=>'placeholder')));
		$menu['users']->addChild('edit', array('label'=>$t->trans('users.edit_user'), 'route'=>'admin_users_edit','routeParameters'=>array('id'=>$this->security->getToken()->getUser()->getId()), 'attributes'=>array('class'=>'placeholder')));

	$menu->addChild('admins', array('label'=>$t->trans('dashboard.admins'),'route' => 'admin_admins_list'));
		$menu['admins']->addChild('list', array('label'=>$t->trans('dashboard.list_admins'), 'route'=>'admin_admins_list', 'attributes'=>array('class'=>'placeholder')));
		$menu['admins']->addChild('add', array('label'=>$t->trans('dashboard.add_admin'), 'route'=>'admin_admins_add', 'attributes'=>array('class'=>'placeholder')));

	
        // ... add more children

	foreach($menu as $key=>$item){
		$item->setExtra('routes', array('routes'=>$key));
	}
	
	#var_dump($item);
	#die(__FILE__.__LINE__);
        return $menu;
    }

    public function createDashboardMenu(Request $request)
    {

	$t = $this->translator;


        $menu = $this->factory->createItem('root');
	
	
	$menu->setChildrenAttributes(array('class'=>'nav'));


       # $menu->addChild('home', array('label'=>$t->trans('dashboard.home'),'route' => 'admin_dashboard_list'))
       #	->setAttribute('icon', '/bundles/admin/images/home-icon.png');

        $menu->addChild('products', array('label'=>$t->trans('dashboard.products'),'route' => 'admin_products_list'))
		->setAttribute('icon', '/bundles/admin/images/products-icon.png');


        $menu->addChild('users', array('label'=>$t->trans('dashboard.users'),'route' => 'admin_users_list'))
		->setAttribute('icon', '/bundles/admin/images/users-icon.png');


        $menu->addChild('user_admins', array('label'=>$t->trans('dashboard.admins_short'),'route' => 'admin_admins_list'))
		->setAttribute('icon', '/bundles/admin/images/admins-icon.png');



        // ... add more children

	foreach($menu as $key=>$item){
		$item->setExtra('routes', array('routes'=>$key));
	}
	
        return $menu;
    }


    public function createAdminsMenu(Request $request)
    {


	$t = $this->translator;


        $menu = $this->factory->createItem('root');
	
	
	$menu->setChildrenAttributes(array('class'=>'nav'));


        $menu->addChild('home', array('label'=>$t->trans('dashboard.home'),'route' => 'admin_dashboard_list'))
       		->setAttribute('icon', '/bundles/admin/images/home-icon.png');

        $menu->addChild('products', array('label'=>$t->trans('dashboard.products'),'route' => 'admin_products_list'))
		->setAttribute('icon', '/bundles/admin/images/products-icon.png');


        $menu->addChild('users', array('label'=>$t->trans('dashboard.users'),'route' => 'admin_users_list'))
		->setAttribute('icon', '/bundles/admin/images/users-icon.png');


        $menu->addChild('user_admins', array('label'=>$t->trans('dashboard.admins_short'),'route' => 'admin_admins_list'))
		->setAttribute('icon', '/bundles/admin/images/admins-icon.png');



        // ... add more children

	foreach($menu as $key=>$item){
		$item->setExtra('routes', array('routes'=>$key));
	}
	
        return $menu;

    }

}

