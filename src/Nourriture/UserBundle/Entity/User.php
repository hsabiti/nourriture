<?php
namespace Nourriture\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\SecurityExtraBundle\Security\Util\String;
use Doctrine\Common\Collections\ArrayCollection;
use FOS\UserBundle\Entity\User as BaseUser;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="Nourriture\UserBundle\Entity\Repository\UserRepository")
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;
	
	/**
	 * @ORM\OneToOne(targetEntity="Nourriture\UserBundle\Entity\Profile", mappedBy="user", cascade={"persist"})
         * @Assert\Type(type="Nourriture\UserBundle\Entity\Profile")
	 */
	protected $profile;

	/**
	 * @ORM\OneToOne(targetEntity="Nourriture\UserBundle\Entity\Address", mappedBy="user", cascade={"persist"})
         * @Assert\Type(type="Nourriture\UserBundle\Entity\Address")
	 */
	protected $address;

	/**
	 * @var String
	 * @ORM\Column(type="string", length=5, nullable=true)
	 */
	
	protected $locale;
	
	
	public function __construct()
	{
		#$request = $this->getRequest();
		 
		#$locale = $request->getLocale();
		 
		#print_r($locale);
		#die(__FILE__.__LINE__);
		parent::__construct();
		// your own logic
		$this->roles = array('ROLE_USER');
	}

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
     * Get locale
     *
     * @return string
     */
    public function getLocale()
    {
    	return $this->locale;
    }

    /**
     * Set locale
     *
     */
    public function setLocale($locale)
    {
    	return $this->locale = $locale;
    }
   


    /**
     * Set profile
     *
     * @param \Nourriture\UserBundle\Entity\Profile $profile
     * @return User
     */
    public function setProfile(\Nourriture\UserBundle\Entity\Profile $profile = null)
    {
        $this->profile = $profile;
    
        return $this;
    }

    /**
     * Get profile
     *
     * @return \Nourriture\UserBundle\Entity\Profile 
     */
    public function getProfile()
    {
        return $this->profile;
    }

    /**
     * Set address
     *
     * @param \Nourriture\UserBundle\Entity\Address $address
     * @return User
     */
    public function setAddress(\Nourriture\UserBundle\Entity\Address $address = null)
    {
        $this->address = $address;
    
        return $this;
    }

    /**
     * Get address
     *
     * @return \Nourriture\UserBundle\Entity\Address 
     */
    public function getAddress()
    {
        return $this->address;
    }

}