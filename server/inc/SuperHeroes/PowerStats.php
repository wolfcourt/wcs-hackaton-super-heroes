<?php

namespace App\SuperHeroes;

class PowerStats
{
    /** @var int */
    private $intelligence;

    /** @var int */
    private $strength;

    /** @var int */
    private $speed;

    /** @var int */
    private $durability;

    /** @var int */
    private $power;

    /** @var int */
    private $combat;

    public function __construct(array $data)
    {
        foreach ($data as $key => $value)
            if(property_exists($this, $key))
                $this->$key = $value;
    }
    

    /**
     * Get the value of intelligence
     * @return int
     */ 
    public function getIntelligence() : int
    {
        return $this->intelligence;
    }

    /**
     * Get the value of strength
     * @return int
     */ 
    public function getStrength() : int
    {
        return $this->strength;
    }

    /**
     * Get the value of speed
     * @return int
     */ 
    public function getSpeed() : int
    {
        return $this->speed;
    }

    /**
     * Get the value of durability
     * @return int
     */ 
    public function getDurability() : int
    {
        return $this->durability;
    }

    /**
     * Get the value of power
     * @return int
     */ 
    public function getPower() : int
    {
        return $this->power;
    }

    /**
     * Get the value of combat
     * @return int
     */ 
    public function getCombat() : int
    {
        return $this->combat;
    }
}
