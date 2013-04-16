<?php
namespace Nourriture\UserBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
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

	public function __construct()
	{
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
     * Get groups
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getGroups()
    {
        return $this->groups;
    }
}