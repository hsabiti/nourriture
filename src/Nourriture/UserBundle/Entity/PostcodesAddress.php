<?php

namespace Nourriture\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PostcodesAddress
 *
 * @ORM\Table(name="postcodes_address")
 * @ORM\Entity
 */
class PostcodesAddress
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="postcode", type="string", length=16, nullable=false)
     */
    private $postcode;

    /**
     * @var integer
     *
     * @ORM\Column(name="urn", type="integer", nullable=false)
     */
    private $urn;

    /**
     * @var string
     *
     * @ORM\Column(name="organisation", type="string", length=60, nullable=false)
     */
    private $organisation;

    /**
     * @var string
     *
     * @ORM\Column(name="department", type="string", length=60, nullable=false)
     */
    private $department;

    /**
     * @var string
     *
     * @ORM\Column(name="po_box", type="string", length=13, nullable=false)
     */
    private $poBox;

    /**
     * @var string
     *
     * @ORM\Column(name="sub_building", type="string", length=30, nullable=false)
     */
    private $subBuilding;

    /**
     * @var string
     *
     * @ORM\Column(name="building_name", type="string", length=50, nullable=false)
     */
    private $buildingName;

    /**
     * @var string
     *
     * @ORM\Column(name="building_number", type="string", length=10, nullable=false)
     */
    private $buildingNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="dependent_street", type="string", length=60, nullable=false)
     */
    private $dependentStreet;

    /**
     * @var string
     *
     * @ORM\Column(name="street", type="string", length=60, nullable=false)
     */
    private $street;

    /**
     * @var string
     *
     * @ORM\Column(name="double_dependent_locality", type="string", length=35, nullable=false)
     */
    private $doubleDependentLocality;

    /**
     * @var string
     *
     * @ORM\Column(name="dependent_locality", type="string", length=35, nullable=false)
     */
    private $dependentLocality;

    /**
     * @var string
     *
     * @ORM\Column(name="town", type="string", length=30, nullable=false)
     */
    private $town;

    /**
     * @var string
     *
     * @ORM\Column(name="county", type="string", length=30, nullable=false)
     */
    private $county;



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
     * Set postcode
     *
     * @param string $postcode
     * @return PostcodesAddress
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
     * Set urn
     *
     * @param integer $urn
     * @return PostcodesAddress
     */
    public function setUrn($urn)
    {
        $this->urn = $urn;
    
        return $this;
    }

    /**
     * Get urn
     *
     * @return integer 
     */
    public function getUrn()
    {
        return $this->urn;
    }

    /**
     * Set organisation
     *
     * @param string $organisation
     * @return PostcodesAddress
     */
    public function setOrganisation($organisation)
    {
        $this->organisation = $organisation;
    
        return $this;
    }

    /**
     * Get organisation
     *
     * @return string 
     */
    public function getOrganisation()
    {
        return $this->organisation;
    }

    /**
     * Set department
     *
     * @param string $department
     * @return PostcodesAddress
     */
    public function setDepartment($department)
    {
        $this->department = $department;
    
        return $this;
    }

    /**
     * Get department
     *
     * @return string 
     */
    public function getDepartment()
    {
        return $this->department;
    }

    /**
     * Set poBox
     *
     * @param string $poBox
     * @return PostcodesAddress
     */
    public function setPoBox($poBox)
    {
        $this->poBox = $poBox;
    
        return $this;
    }

    /**
     * Get poBox
     *
     * @return string 
     */
    public function getPoBox()
    {
        return $this->poBox;
    }

    /**
     * Set subBuilding
     *
     * @param string $subBuilding
     * @return PostcodesAddress
     */
    public function setSubBuilding($subBuilding)
    {
        $this->subBuilding = $subBuilding;
    
        return $this;
    }

    /**
     * Get subBuilding
     *
     * @return string 
     */
    public function getSubBuilding()
    {
        return $this->subBuilding;
    }

    /**
     * Set buildingName
     *
     * @param string $buildingName
     * @return PostcodesAddress
     */
    public function setBuildingName($buildingName)
    {
        $this->buildingName = $buildingName;
    
        return $this;
    }

    /**
     * Get buildingName
     *
     * @return string 
     */
    public function getBuildingName()
    {
        return $this->buildingName;
    }

    /**
     * Set buildingNumber
     *
     * @param string $buildingNumber
     * @return PostcodesAddress
     */
    public function setBuildingNumber($buildingNumber)
    {
        $this->buildingNumber = $buildingNumber;
    
        return $this;
    }

    /**
     * Get buildingNumber
     *
     * @return string 
     */
    public function getBuildingNumber()
    {
        return $this->buildingNumber;
    }

    /**
     * Set dependentStreet
     *
     * @param string $dependentStreet
     * @return PostcodesAddress
     */
    public function setDependentStreet($dependentStreet)
    {
        $this->dependentStreet = $dependentStreet;
    
        return $this;
    }

    /**
     * Get dependentStreet
     *
     * @return string 
     */
    public function getDependentStreet()
    {
        return $this->dependentStreet;
    }

    /**
     * Set street
     *
     * @param string $street
     * @return PostcodesAddress
     */
    public function setStreet($street)
    {
        $this->street = $street;
    
        return $this;
    }

    /**
     * Get street
     *
     * @return string 
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * Set doubleDependentLocality
     *
     * @param string $doubleDependentLocality
     * @return PostcodesAddress
     */
    public function setDoubleDependentLocality($doubleDependentLocality)
    {
        $this->doubleDependentLocality = $doubleDependentLocality;
    
        return $this;
    }

    /**
     * Get doubleDependentLocality
     *
     * @return string 
     */
    public function getDoubleDependentLocality()
    {
        return $this->doubleDependentLocality;
    }

    /**
     * Set dependentLocality
     *
     * @param string $dependentLocality
     * @return PostcodesAddress
     */
    public function setDependentLocality($dependentLocality)
    {
        $this->dependentLocality = $dependentLocality;
    
        return $this;
    }

    /**
     * Get dependentLocality
     *
     * @return string 
     */
    public function getDependentLocality()
    {
        return $this->dependentLocality;
    }

    /**
     * Set town
     *
     * @param string $town
     * @return PostcodesAddress
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
     * Set county
     *
     * @param string $county
     * @return PostcodesAddress
     */
    public function setCounty($county)
    {
        $this->county = $county;
    
        return $this;
    }

    /**
     * Get county
     *
     * @return string 
     */
    public function getCounty()
    {
        return $this->county;
    }
}