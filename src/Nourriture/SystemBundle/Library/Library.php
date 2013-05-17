<?php
namespace Nourriture\SystemBundle\Library;

use Nourriture\SystemBundle\Traits\Singleton;


class Library{
	use Singleton;
	public function ello(){
		die(__CLASS__.__FUNCTION__.__FILE__.__LINE__);
	}
	public function formatAddresses($addresses){
		$_addresses = [];
		#$_address = $addresses[0];
		#organisation, department, po_box, sub_building, building_name, building_number 
		#$firstline = 
		#$addresses['firstline'] = $firstline;
		foreach($addresses as $address){
			$firstline = $address->getOrganisation() . $address->getDepartment() . $address->getPoBox() . $address->getSubBuilding() . $address->getBuildingName() . $address->getBuildingNumber();
			$options[] 	= $firstline;
			#$_addresses['firstline'] = $firstline;
		}
		$address = $addresses[0];
		$_address['street']	= ucfirst(strtolower($address->getStreet()));
		$_address['town'] 	= ucfirst(strtolower($address->getTown()));
		$_address = array('address'=>$_address, 'options'=>$options);
#print_r($_address);
#die(__FILE__.__LINE__);
		return json_encode($_address);
	}
	

}
