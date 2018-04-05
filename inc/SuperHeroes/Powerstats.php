<?php

namespace App\SuperHeroes;

class Powerstats
{
    /**
     * @return int
     */ 
    private $intelligence;

    /**
     * @return int
     */ 
    private $strenght;

    /**
     * @return int
     */ 
    private $speed;

    /**
     * @return int
     */ 
    private $durability;

    /**
     * @return int
     */ 
    private $power;

    /**
     * @return int
     */ 
    private $combat;

    public function __construct(array $data)
    {
        foreach ($data as $key => $value)
            if(property_exists($this, $key))
            $this->$key = $value;
    }
    

    /**
     * Get the value of intelligence
     */ 
    public function getIntelligence() : int
    {
        return $this->intelligence;
    }

    /**
     * Get the value of strenght
     */ 
    public function getStrenght() : int
    {
        return $this->strenght;
    }

    /**
     * Get the value of speed
     */ 
    public function getSpeed() : int
    {
        return $this->speed;
    }

    /**
     * Get the value of durability
     */ 
    public function getDurability() : int
    {
        return $this->durability;
    }

    /**
     * Get the value of power
     */ 
    public function getPower() : int
    {
        return $this->power;
    }

    /**
     * Get the value of combat
     */ 
    public function getCombat() : int
    {
        return $this->combat;
    }
}