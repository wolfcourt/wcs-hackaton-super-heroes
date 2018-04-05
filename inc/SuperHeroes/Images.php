<?php
/**
 * Created by PhpStorm.
 * User: sapuraizu
 * Date: 05/04/18
 * Time: 18:24
 */

namespace App\SuperHeroes;

class Images
{
    /** @var string */
    private $xs;
    /** @var string */
    private $sm;
    /** @var string */
    private $md;
    /** @var string */
    private $lg;

    public function __construct(array $images)
    {
        foreach ($images AS $key => $value)
            if (property_exists($this, $key))
                $this->$key = $value;
    }

    /**
     * Return extra small image's link (32x48)
     * @return string
     */
    public function getXs(): string { return $this->xs; }

    /**
     * Return small image's link (160x240)
     * @return string
     */
    public function getSm(): string { return $this->sm; }

    /**
     * Return middle size image's link (320x480)
     * @return string
     */
    public function getMd(): string { return $this->md; }

    /**
     * Return large image's link (480x640)
     * @return string
     */
    public function getLg(): string { return $this->lg; }

}
