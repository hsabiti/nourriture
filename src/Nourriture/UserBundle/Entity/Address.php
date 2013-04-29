<?php 
namespace Nourriture\UserBundle\Entity;

use Doctrine\Tests\Common\Annotations\True;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Mapping\ClassMetadata;
use Synfony\Component\Validator\NotBlank;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Nourriture\UserBundle\Entity\Address
 * @ORM\Entity
 * @ORM\Table(name="address")
 */


 class Address{
 	/**
         * @ORM\Id
         * @ORM\Column(type="integer")
         * @ORM\GeneratedValue(strategy="AUTO")
         */
	private $id;
 	
	/**
 	 * @var integer $house_no
 	 * @ORM\Column(type="string", length=25)
 	 */
 	private $house_no;

 	/**
 	 * @var integer $firstline
 	 * @ORM\Column(type="string", length=25)
 	 */
 	private $firstline;
 	
 	
 	/**
 	 * @ORM\Column(type="string", length=25)
 	 */
 	private $postcode;

 
    

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set telephone
     *
     * @param string $telephone
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
    }

    /**
     * Get telephone
     *
     * @return string 
     */
    public function getTelephone()
    {
        return $this->telephone;
    }
    
    public static function loadValidatorMetadata(ClassMetaData $metadata){
    	/*$metadata->addGetterConstraint(
    									'telephone', new Assert\NotBlank(array('message' => 'Going ML, telephone cannot be blank' . __FILE__ . __LINE__))
    								);
   		*/				
    	//$metadata->addPropertyConstraint('telephone', new Assert\NotBlank(array('message'=>'Telephone Cannot be Blank')));
    	$metadata->addPropertyConstraint('telephone', new Assert\MinLength(
    																		array(
    																				'limit'		=>	3,
    																				'message'	=>	"Telephone is too short dude... " . __FILE__ . __LINE__
    																			)
    																	));
    	$metadata->addPropertyConstraint('telephone', new Assert\MinLength(
    			array(
    					'limit'		=>	3,
    					'message'	=>	"Mobile is too short dude... " . __FILE__ . __LINE__
    				)
    			));
    																	
    }
    
  

    /**
     * Set mobile
     *
     * @param integer $mobile
     */
    public function setMobile($mobile)
    {
        $this->mobile = $mobile;
    }

    /**
     * Get mobile
     *
     * @return integer 
     */
    public function getMobile()
    {
        return $this->mobile;
    }
}
