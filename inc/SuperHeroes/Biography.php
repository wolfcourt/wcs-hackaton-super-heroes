<?php
namespace App\SuperHeroes;

class Biography
{
    /** @var string */
    private $fullName;
    /** @var string */
    private $alterEgos;
    /** @var string[] */
    private $aliases;
    /** @var string */
    private $placeOfBirth;
    /** @var string */
    private $firstAppearance;
    /** @var string */
    private $publisher;
    /** @var string */
    private $alignment;

    public function __construct(array $data)
    {
        foreach ($data as $key => $value)
            if(property_exists($this, $key))
                $this->$key = $value;
    }

    /**
     * Return the full name
     * @return string
     */
    public function getFullName() : string { return $this->fullName; }

    /**
     * Return alter egos
     * @return string
     */
    public function getAlterEgos() : string { return $this->alterEgos; }

    /**
     * Return names aliases
     * @return array
     */
    public function getAliases() : array { return $this->aliases; }

    /**
     * Return place of birth
     * @return string
     */
    public function getPlaceOfBirth() : string { return $this->placeOfBirth; }

    /**
     * Return first appearance names
     * @return string
     */
    public function getFirstAppearance() : string { return $this->firstAppearance; }

    /**
     * Return the publisher
     * @return string
     */
    public function getPublisher() : string { return $this->publisher; }

    /**
     * Return the alignment
     * @return string
     */
    public function getAlignment() : string { return $this->alignment; }
}