<?php

namespace RBBusiness\SelectableBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Selection
 *
 * @ORM\Table(name="selections",indexes={@ORM\Index(name="selection_pair_idx", columns={"sel_key", "sel_value"})})
 * @ORM\Entity
 */
class Selection
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

   /**
     * @var string
     *
     * @ORM\Column(name="sel_key", type="string", length=64)
     */
    private $sel_key;

    /**
     * @var string
     * @ORM\Column(name="sel_value", type="string", length=64)
     */
    private $sel_value;

    /**
     * @var string
     * @ORM\Column(name="locale", type="string", length=8, nullable=false, options={"default" = "en"})
     */
    private $locale;

    /**
     * @var string
     *
     * @ORM\Column(name="sel_label", type="string", length=255)
     */
    private $sel_label;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=2000, nullable=true)
     */
    private $description;

    /**
     * @var integer
     *
     * @ORM\Column(name="idx", type="smallint")
     */
    private $idx;


    /**
     * Get id
     *
     * @return string 
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * Set sel_key
     *
     * @param string $selKey
     * @return Selection
     */
    public function setSelKey($selKey)
    {
        $this->sel_key = $selKey;
    
        return $this;
    }

    /**
     * Get sel_key
     *
     * @return string 
     */
    public function getSelKey()
    {
        return $this->sel_key;
    }

    /**
     * Set sel_value
     *
     * @param string $selValue
     * @return Selection
     */
    public function setSelValue($selValue)
    {
        $this->sel_value = $selValue;
    
        return $this;
    }

    /**
     * Get sel_value
     *
     * @return string 
     */
    public function getSelValue()
    {
        return $this->sel_value;
    }

    /**
     * Set locale
     *
     * @param string $locale
     * @return Selection
     */
    public function setLocale($locale)
    {
        $this->locale = $locale;
    
        return $this;
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
     * Set sel_label
     *
     * @param string $selLabel
     * @return Selection
     */
    public function setSelLabel($selLabel)
    {
        $this->sel_label = $selLabel;
    
        return $this;
    }

    /**
     * Get sel_label
     *
     * @return string 
     */
    public function getSelLabel()
    {
        return $this->sel_label;
    }

    /**
     * Set locale
     *
     * @param string $description
     * @return Selection
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
     * Set idx
     *
     * @param integer $idx
     * @return Selection
     */
    public function setIdx($idx)
    {
        $this->idx = $idx;
    
        return $this;
    }

    /**
     * Get idx
     *
     * @return integer 
     */
    public function getIdx()
    {
        return $this->idx;
    }

    public function __toString() {
        return $this->getSelLabel() . " (" . $this->getSelKey() . "[" . $this->getLocale() . "][" . $this->getSelValue() . "])";
    }
}
