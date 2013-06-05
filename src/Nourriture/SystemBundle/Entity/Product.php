<?php
namespace Nourriture\SystemBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Nourriture\SystemBundle\Library\SimpleImage;
use Nourriture\SystemBundle\Library\Library;
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
	 * @Gedmo\Slug(fields={"name","summary"})
	 * @ORM\Column(type="string", length=128, unique=true)
	 */
	protected $slug;

	/**
	 * @var string
	 * @ORM\Column(type="string", length=120, nullable=true)
	 */
	protected $summary;

        /**
	 * @var interger
	 * @ORM\Column(type="decimal", length=5, nullable=false)
	 */
	protected $netweight;
	
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
	 * @ORM\Column(type="string", length=100, nullable=true)
	 */

	protected $image;

	/**
	 * @var String
	 * @ORM\Column(type="boolean", length=1, nullable=true)
	 */
	

	protected $enabled;

	/**
	 * @var float
	 * @ORM\Column(type="float", length=5, nullable=false)
	 */
	

	protected $price;




	protected $uploadPath;
	protected $main_dimension;
	protected $thumb_dimension;
	


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

    /**
     * Set netweight
     *
     * @param float $netweight
     * @return Product
     */
    public function setNetweight($netweight)
    {
        $this->netweight = $netweight;

        return $this;
    }

    /**
     * Get netweight
     *
     * @return float 
     */
    public function getNetweight()
    {
        return $this->netweight;
    }

    /**
     * Set summary
     *
     * @param string $summary
     * @return Product
     */
    public function setSummary($summary)
    {
        $this->summary = $summary;

        return $this;
    }

    /**
     * Get summary
     *
     * @return string 
     */
    public function getSummary()
    {
        return $this->summary;
    }

    /**
     * Set enabled
     *
     * @param \DateTime $enabled
     * @return Product
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;

        return $this;
    }

    /**
     * Get enabled
     *
     * @return \DateTime 
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * Set image
     *
     * @param string $image
     * @return Product
     */
    public function setImage($image)
    {
       
	if(null !== $image)
	 $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string 
     */
    public function getImage()
    {
        return $this->image;
    }
    public function upload(){
	if(null===$this->getImage() || !is_object($this->getImage())) return;

	$image_name =  $this->getSlug() . "." . Library::getFileExtension($this->getImage()->getClientOriginalName());

	#Main
	$si = SimpleImage::getInstance()->setUploadedImage($this->getImage())->load($this->getImage()->getPathName());
	$original_info = $si->get_original_info();

	//trasverse
	if($original_info['width'] >= $original_info['height']){
		$si->fit_to_width($this->getMainDimension());
	}else{ //longitudinal
		$si->fit_to_height($this->getMainDimension());
	}
	//create Main
        #$si->resize(500, 500);
	$si->save($this->getUploadPath() . "/" . $image_name);


	//create Thumbnail
	$si = SimpleImage::getInstance()->setUploadedImage($this->getImage())->load($this->getImage()->getPathName());
	$original_info = $si->get_original_info();
	
	//trasverse
	if($original_info['width'] >= $original_info['height']){
		$si->fit_to_width($this->getThumbDimension());
	}else{ //longitudinal
		$si->fit_to_height($this->getThumbDimension());
	}
	#$si->resize(100, 100);
	
	$si->save($this->getUploadPath() . "/thumbs/" . $image_name);

	#remove uploaded file
	unlink($this->getImage()->getPathName());

	$this->setImage($image_name);
	#var_dump($this->getImage()->getPathName());
	//var_dump($si);
	#die(__FILE__.__LINE__);

    }
    public function setUploadPath($path){
	$this->uploadPath = $path;
    }
    public function getUploadPath(){
	return $this->uploadPath;
    }
    public function setMainDimension($size){
	$this->main_dimension = $size;
    }
    public function getMainDimension(){
	return $this->main_dimension;
    }
    public function setThumbDimension($size){
	$this->thumb_dimension = $size;
    }
    public function getThumbDimension(){
	return $this->thumb_dimension;
    }

    /**
     * Set price
     *
     * @param float $price
     * @return Product
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return float 
     */
    public function getPrice()
    {
        return $this->price;
    }
}
