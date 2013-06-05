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
 	 * @var string $firstline
 	 * @ORM\Column(type="string", length=100)
 	 */
 	private $firstline;

	/**
         * @var string $secondline
         * @ORM\Column(type="string", length=100)
         */
        private $secondline;

	/**
         * @var string $thirdline
         * @ORM\Column(type="string", length=100, nullable=true)
         */
        private $thirdline;

	/**
         * @var string $town
         * @ORM\Column(type="string", length=100, nullable=true)
         */
        private $town;

	/**
         * @var string $state
         * @ORM\Column(type="string", length=100, nullable=true)
         */
        private $state;

	/**
         * @var string $country
         * @ORM\Column(type="string", length=100)
         */
        private $country;


	/**
         * @ORM\OneToOne(targetEntity="Nourriture\UserBundle\Entity\User", inversedBy="address")
         * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
         */

        private $user; 	
 	
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

    /**
     * Set secondline
     *
     * @param string $secondline
     * @return Address
     */
    public function setSecondline($secondline)
    {
        $this->secondline = $secondline;
    
        return $this;
    }

    /**
     * Get secondline
     *
     * @return string 
     */
    public function getSecondline()
    {
        return $this->secondline;
    }

    /**
     * Set thirdline
     *
     * @param string $thirdline
     * @return Address
     */
    public function setThirdline($thirdline)
    {
        $this->thirdline = $thirdline;
    
        return $this;
    }

    /**
     * Get thirdline
     *
     * @return string 
     */
    public function getThirdline()
    {
        return $this->thirdline;
    }

    /**
     * Set town
     *
     * @param string $town
     * @return Address
     */
    public function setTown($town)
    {
        $this->town = $town;
    
        return $this;
    }

    /**
     * Get town
     *
     * @return string 
     */
    public function getTown()
    {
        return $this->town;
    }

    /**
     * Set state
     *
     * @param string $state
     * @return Address
     */
    public function setState($state)
    {
        $this->state = $state;
    
        return $this;
    }

    /**
     * Get state
     *
     * @return string 
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set country
     *
     * @param string $country
     * @return Address
     */
    public function setCountry($country)
    {
        $this->country = $country;
    
        return $this;
    }

    /**
     * Get country
     *
     * @return string 
     */
    public function getCountry()
    {
        return $this->country;
    }
}
