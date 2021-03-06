<?php
namespace Nourriture\SystemBundle\Entity;
use Doctrine\Tests\Common\Annotations\True;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Mapping\ClassMetadata;
use Synfony\Component\Validator\NotBlank;
use Symfony\Component\Validator\Constraints as Assert;

use Sylius\Bundle\CartBundle\Entity\Cart as BaseCart;

/**
 * Nourriture\SystemBundle\Entity\Cart
 * @ORM\Entity
 * @ORM\Table(name="cart")
 */

class Cart extends BaseCart
{
	
	
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;

/*
 <field name="locked" column="locked" type="boolean" />
        <field name="totalItems" column="total_items" type="integer" />
        <field name="total" column="total" type="decimal" precision="10" scale="2" />
        <field name="expiresAt" column="expires_at" type="datetime" />
*/

	/**
         * @ORM\Column(type="boolean", nullable=true)
         */
        protected $locked;

	/**
         * @ORM\Column(type="integer", nullable=true)
         */
        protected $total_items;

	/**
         * @ORM\Column(type="decimal", precision=10, scale=2)
         */
        protected $total;


	/**
         * @ORM\Column(type="datetime", nullable=true)
         */
        protected $expires_at;



        /**
         * @ORM\OneToMany(targetEntity="Nourriture\SystemBundle\Entity\CartItem", mappedBy="cart", orphanRemoval=true, cascade={"persist"})
	 *
         */
       protected $items;

    
    public function __construct(){
         parent::__construct();
         $this->items = new ArrayCollection();
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
     * {@inheritdoc}
     */
    public function removeItem(\Sylius\Bundle\CartBundle\Model\CartItemInterface $item)
    {
	return parent::removeItem($item);
	
	var_dump(count($this->items));
	die(__FILE__.__LINE__);
        if ($this->items->contains($item)) {
	/*    if($item->getQuantity() > 1){
		$item->setQuantity($item->getQuantity()-1);
		$this->saveCart();
	   }	
            $this->items->removeElement($item);
	var_dump($item->getQuantity());
	die(__FILE__.__LINE__);	
	*/
            $item->setCart(null);
        }

        return $this;
    }



    /**
     * Set total_items
     *
     * @param integer $totalItems
     * @return Cart
     */
    public function setTotalItems($totalItems)
    {
        $this->total_items = $totalItems;

        return $this;
    }

    /**
     * Get total_items
     *
     * @return integer 
     */
    public function getTotalItems()
    {
        return $this->total_items;
    }

    /**
     * Set total
     *
     * @param float $total
     * @return Cart
     */
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }

    /**
     * Get total
     *
     * @return float 
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Set expires_at
     *
     * @param \DateTime $expiresAt
     * @return Cart
     */
    public function setExpiresAt(DateTime $expiresAt = NULL)
    {
        $this->expires_at = $expiresAt;

        return $this;
    }

    /**
     * Get expires_at
     *
     * @return \DateTime 
     */
    public function getExpiresAt()
    {
        return $this->expires_at;
    }

    /**
     * Add items
     *
     * @param \Nourriture\SystemBundle\Entity\CartItem $items
     * @return Cart
     */
    public function addItem(\Sylius\Bundle\CartBundle\Model\CartItemInterface $item)
    {
	

	return parent::addItem($item);
	//die(__FILE__.__LINE__);

        //$this->items[] = $items;

        //return $this;
    }

    /**
     * Get items
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getItems()
    {
        return $this->items;
    }
}
