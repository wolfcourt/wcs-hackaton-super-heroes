<?php
/**
 * Created by PhpStorm.
 * User: wilder11
 * Date: 05/04/18
 * Time: 16:55
 */

namespace App\SuperHeroes;


class appearance
{
    /** @var string */
    private $gender;
    /** @var string */
    private $race;
    /** @var string[] */
    private $height;
    /** @var string[] */
    private $weight;
    /** @var string */
    private $eyeColor;
    /** @var string */
    private $hairColor;

    public function __construct(array $data)
    {
        foreach ($data as $key => $value)
            if(property_exists($this, $key))
                $this->$key = $value;
    }

    /**
     * return Gender
     * @return string
     */
    public function getGender() : string
    {
        return $this->gender;
    }

    /**
     * return Race
     * @return string
     */
    public function getRace() : string
    {
        return $this->race;
    }

    /**
     * return Height
     * @return string[]
     */
    public function getHeight() : string
    {
        return $this->height;
    }

    /**
     * return Weight
     * @return string[]
     */
    public function getWeight() : string
    {
        return $this->weight;
    }


    /**
     * return Eye Color
     * @return string
     */
    public function getEyeColor() : string
    {
        return $this->eyeColor;
    }

    /**
     * return Hair Color
     * @return string
     */
    public function getHairColor() : string
    {
        return $this->hairColor;
    }

}


