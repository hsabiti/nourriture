<?php
namespace Nourriture\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\GroupInterface;
use JMS\SecurityExtraBundle\Security\Util\String;
use FOS\UserBundle\Entity\User as BaseUser;

/**
 * @ORM\Entity(repositoryClass="Nourriture\UserBundle\Entity\UserRepository")
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
	 * @ORM\ManyToMany(targetEntity="Nourriture\UserBundle\Entity\Group")
	 * @ORM\JoinTable(name="fos_user_user_group"),
	 *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
	 *      inversedJoinColumns={@ORM\JoinColumn(name="group_id", referencedColumnName="id")}
	 */
	protected $groups;

	/**
	 * @ORM\ManyToOne(targetEntity="Nourriture\UserBundle\Entity\Profile")
	 *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
	 *      inversedJoinColumns={@ORM\JoinColumn(name="profile_id", referencedColumnName="id")}
	 */
	protected $profile;

	/**
	 * @ORM\ManyToOne(targetEntity="Nourriture\UserBundle\Entity\Address")
	 *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
	 *      inversedJoinColumns={@ORM\JoinColumn(name="address_id", referencedColumnName="id")}
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
     * Get groups
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getGroups()
    {
        return $this->groups;
    }
    
    public function addGroup(GroupInterface $group)
    {
    	if($this->getGroups() ==null){
    		$this->groups[] = $group;
    	}elseif (!$this->getGroups()->contains($group)) {
    		$this->getGroups()->add($group);
    	}
    
    	return $this;
    }


}
