<?php
/**
 * Created by PhpStorm.
 * User: wilder14
 * Date: 05/04/18
 * Time: 17:03
 */

namespace App\SuperHeroes;

class Connections
{
    /** @var string */
    private $groupAffiliation;
    /** @var string */
    private $relatives;

    public function __construct(array $data)
    {
        foreach ($data as $key=>$value)
            if (property_exists($this, $key))
                $this->$key = $value;
    }

    /**
     * Return group affiliation
     * @return string
     */
    public function getGroupAffiliation(): string
    {
        return $this->groupAffiliation;
    }

    /**
     * Return relations
     * @return string
     */
    public function getRelatives(): string
    {
        return $this->relatives;
    }
}
