<?php

namespace Nourriture\UserBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * PostcodesAddressRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class PostcodesAddressRepository extends EntityRepository{

   public function _findByPostcode($postcode){

#        die($postcode . __FILE__.__LINE__);
	
	#organisation, department, po_box, sub_building, building_name, building_number
        $q = $this->createQueryBuilder('a')
                        ->select('a.postcode, a.street')
                        ->where('a.postcode LIKE :postcode')
                        ->setParameter('postcode', "%$postcode%")
                        ->orderBy('a.id','ASC');

			#$q->expr()->concat('a.steet','a.department','a.po_box','a.sub_building','a.building_name','a.building_number','a.dependent_street','a.street');

                       $rs =  $q->getQuery()
                        ->getResult();
		var_dump($rs);
		die(__FILE__.__LINE__);

    }


}
