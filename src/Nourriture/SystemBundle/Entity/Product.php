<?php
namespace Nourriture\SystemBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\SecurityExtraBundle\Security\Util\String;
use Doctrine\Common\Collections\ArrayCollection;
use FOS\UserBundle\Entity\User as BaseUser;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="Nourriture\SystemBundle\Entity\Repository\ProductRepository")
 * @ORM\Table(name="products")
 */
class Product
{
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;
	

	/**
	 * @var String
	 * @ORM\Column(type="string", length=255, nullable=false)
	 */
	
	protected $name;
	
	/**
	 * @var String
	 * @ORM\Column(type="string", length=255, nullable=false)
	 */
	
	protected $slug;

	/**
	 * @var String
	 * @ORM\Column(type="string", length=255, nullable=false)
	 */
	
	protected $description;
	
	
	/**
	 * @var String
	 * @ORM\Column(type="datetime", length=25, nullable=false)
	 */
	
	protected $available_on;


	

	/**
	 * @var String
	 * @ORM\Column(type="datetime", length=25, nullable=false)
	 */
	
	protected $created;

	/**
	 * @var String
	 * @ORM\Column(type="datetime", length=25, nullable=false)
	 */
	

	protected $updated;

	/**
	 * @var String
	 * @ORM\Column(type="datetime", length=25, nullable=false)
	 */
	

	protected $deleted;


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
     * Set name
     *
     * @param string $name
     * @return Product
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return Product
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Product
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set createdat
     *
     * @param \DateTime $createdat
     * @return Product
     */
    public function setCreatedat($createdat)
    {
        $this->createdat = $createdat;

        return $this;
    }

    /**
     * Get createdat
     *
     * @return \DateTime 
     */
    public function getCreatedat()
    {
        return $this->createdat;
    }

    /**
     * Set available_on
     *
     * @param \DateTime $availableOn
     * @return Product
     */
    public function setAvailableOn($availableOn)
    {
        $this->available_on = $availableOn;

        return $this;
    }

    /**
     * Get available_on
     *
     * @return \DateTime 
     */
    public function getAvailableOn()
    {
        return $this->available_on;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return Product
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime 
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set updated
     *
     * @param \DateTime $updated
     * @return Product
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;

        return $this;
    }

    /**
     * Get updated
     *
     * @return \DateTime 
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Set deleted
     *
     * @param \DateTime $deleted
     * @return Product
     */
    public function setDeleted($deleted)
    {
        $this->deleted = $deleted;

        return $this;
    }

    /**
     * Get deleted
     *
     * @return \DateTime 
     */
    public function getDeleted()
    {
        return $this->deleted;
    }
}
