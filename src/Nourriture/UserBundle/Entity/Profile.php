<?php 
namespace Nourriture\UserBundle\Entity;

use Doctrine\Tests\Common\Annotations\True;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Mapping\ClassMetadata;
use Synfony\Component\Validator\NotBlank;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * Nourriture\UserBundle\Entity\Profile
 * @ORM\Entity
 * @ORM\Table(name="profile")
 */


 class Profile{
 	/**
         * @ORM\Id
         * @ORM\Column(type="integer")
         * @ORM\GeneratedValue(strategy="AUTO")
         */
	private $id;

	/**
         * @ORM\OneToOne(targetEntity="Nourriture\UserBundle\Entity\User", inversedBy="profile")
	 * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
         */

	private $user;
 	
	/**
 	 * @var string $firstname
 	 * @ORM\Column(type="string", length=25)
 	 */
 	private $firstname;
	
	/**
 	 * @var string $lastname
 	 * @ORM\Column(type="string", length=25)
 	 */
 	private $lastname;

 	/**
 	 * @var integer $telephone
 	 * @ORM\Column(type="integer", length=25, nullable=true)
 	 */
 	private $telephone;
 	
 	
 	/**
 	 * @var integer $mobile
 	 * @ORM\Column(type="string", length=25)
 	 */
 	private $mobile;

	/**
         * @var String
         * @ORM\Column(type="string", length=5, nullable=true)
         */

        protected $locale; 
    

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

    /**
     * Set firstname
     *
     * @param string $firstname
     * @return Profile
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    
        return $this;
    }

    /**
     * Get firstname
     *
     * @return string 
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     * @return Profile
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    
        return $this;
    }

    /**
     * Get lastname
     *
     * @return string 
     */
    public function getLastname()
    {
        return $this->lastname;
    }
    public function __toString(){
	//var_dump($this);
	//die(__FILE__.__LINE__);
	

	return 'Profile testing ' . $this->getLastname();
    }

    /**
     * Set locale
     *
     * @param string $locale
     * @return Profile
     */
    public function setLocale($locale)
    {
        $this->locale = $locale;
    
        return $this;
    }

    /**
     * Get locale
     *
     * @return string 
     */
    public function getLocale()
    {
        return $this->locale;
    }

    /**
     * Set user
     *
     * @param \Nourriture\UserBundle\Entity\User $user
     * @return Profile
     */
    public function setUser(\Nourriture\UserBundle\Entity\User $user = null)
    {
        $this->user = $user;
    
        return $this;
    }

    /**
     * Get user
     *
     * @return \Nourriture\UserBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }
   	
}