<?php
namespace Nourriture\SystemBundle\Entity;
use Doctrine\Tests\Common\Annotations\True;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Mapping\ClassMetadata;
use Synfony\Component\Validator\NotBlank;
use Symfony\Component\Validator\Constraints as Assert;

use Sylius\Bundle\CartBundle\Entity\CartItem as BaseCartItem;

/**
 * Nourriture\SystemBundle\Entity\CartItem
 * @ORM\Entity(repositoryClass="Nourriture\SystemBundle\Entity\Repository\CartItemRepository")
 * @ORM\Table(name="cart_item")
 */

class CartItem extends BaseCartItem
{
	
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;
	
/*

<field name="quantity" column="quantity" type="integer" />
        <field name="unitPrice" column="unit_price" type="decimal" precision="10" scale="2" />
        <field name="total" column="total" type="decimal" precision="10" scale="2" />


*/	

	/**
	 * @ORM\Column(type="integer", name="quantity")
	 */
	protected $quantity;

	/**
	 * @ORM\Column(type="decimal",  precision=10, scale=2)
	 */
	protected $unit_price;

	/**
	 * @ORM\Column(type="decimal", name="total", precision=10, scale=2)
	 */
	protected $total;

	/**
	 * @ORM\ManyToOne(targetEntity="Nourriture\SystemBundle\Entity\Product")
	 * @ORM\JoinColumn(name="product_id", referencedColumnName="id", onDelete="SET NULL")
	 */
	
	private $product;
   
         /**
	 * @ORM\ManyToOne(targetEntity="\Sylius\Bundle\CartBundle\Model\CartInterface", inversedBy="items")
	 * @ORM\JoinColumn(name="cart_id", referencedColumnName="id", onDelete="SET NULL")
	 */
	
	protected $cart;
   



    
    public function getProduct()
    {
        return $this->product;
    }

    public function setProduct(Product $product)
    {
        $this->product = $product;
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
    public function equals(\Sylius\Bundle\CartBundle\Model\CartItemInterface $cartItem)
    {
        //var_dump($this->getProduct()->getId());
#var_dump($this->product);
#var_dump($cartItem->getproduct());
#        var_dump($cartItem->getId());
#die(__FILE__.__LINE__); 
      

	  return $this->getProduct() === $cartItem->getProduct();
	 # return $this->getId() === $cartItem->getId();
    }


    /**
     * Set quantity
     *
     * @param integer $quantity
     * @return CartItem
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get quantity
     *
     * @return integer 
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set unit_price
     *
     * @param float $unitPrice
     * @return CartItem
     */
    public function setUnitPrice($unitPrice)
    {
        $this->unit_price = $unitPrice;

        return $this;
    }

    /**
     * Get unit_price
     *
     * @return float 
     */
    public function getUnitPrice()
    {
        return $this->unit_price;
    }

    /**
     * Set total
     *
     * @param float $total
     * @return CartItem
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
     * Set cart
     *
     * @param \Sylius\Bundle\CartBundle\Model\CartInterface $cart
     * @return CartItem
     */
    public function setCart(\Sylius\Bundle\CartBundle\Model\CartInterface $cart = null)
    {
        $this->cart = $cart;

        return $this;
    }

    /**
     * Get cart
     *
     * @return \Nourriture\SystemBundle\Entity\Cart 
     */
    public function getCart()
    {
        return $this->cart;
    }
}
