<?php
/**
 * Created by PhpStorm.
 * User: wilder7
 * Date: 05/04/18
 * Time: 17:45
 */

namespace App\SuperHeroes;


class Work
{
    /**
     * @var string
     */
    private $occupation;
    /**
     * @var string
     */
    private $base;

    /**
     * return occupation
     * @return string
     */
    public function getOccupation(): string
    {
        return $this->occupation;
    }

    /**
     * return base
     * @return string
     */
    public function getBase(): string
    {
        return $this->base;
    }

    /**
     * @param string $base
     */
    public function __construct(array $data)
    {
        foreach ($data as $key => $value)
            if (property_exists($this, $key))
                $this -> $key = $value;
    }
}