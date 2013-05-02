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
         * @ORM\OneToOne(targetEntity="Nourriture\UserBundle\Entity\User", inversedBy="address")
         * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
         */

        private $user;

 	/**
 	 * @var integer $firstline
 	 * @ORM\Column(type="string", length=25)
 	 */
 	private $firstline;
 	
 	
 	/**
	 * @var string $postcode
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
     * Set house_no
     *
     * @param string $houseNo
     * @return Address
     */
    public function setHouseNo($houseNo)
    {
        $this->house_no = $houseNo;
    
        return $this;
    }

    /**
     * Get house_no
     *
     * @return string 
     */
    public function getHouseNo()
    {
        return $this->house_no;
    }

    /**
     * Set firstline
     *
     * @param string $firstline
     * @return Address
     */
    public function setFirstline($firstline)
    {
        $this->firstline = $firstline;
    
        return $this;
    }

    /**
     * Get firstline
     *
     * @return string 
     */
    public function getFirstline()
    {
        return $this->firstline;
    }

    /**
     * Set postcode
     *
     * @param string $postcode
     * @return Address
     */
    public function setPostcode($postcode)
    {
        $this->postcode = $postcode;
    
        return $this;
    }

    /**
     * Get postcode
     *
     * @return string 
     */
    public function getPostcode()
    {
        return $this->postcode;
    }

    /**
     * Set user
     *
     * @param \Nourriture\UserBundle\Entity\User $user
     * @return Address
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