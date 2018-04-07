<?php
/**
 * Created by PhpStorm.
 * User: sapuraizu
 * Date: 05/04/18
 * Time: 18:16
 */

namespace App\SuperHeroes;

class Character
{
    /** @var int */
    private $id;
    /** @var string */
    private $name;
    /** @var string */
    private $slug;
    /** @var PowerStats */
    private $powerstats;
    /** @var Appearance */
    private $appearance;
    /** @var Biography */
    private $biography;
    /** @var Work */
    private $work;
    /** @var Connections */
    private $connections;
    /** @var Images */
    private $images;

    public function __construct(array $data)
    {
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->slug = $data['slug'];
        $this->powerstats = new PowerStats($data['powerstats']);
        $this->appearance = new Appearance($data['appearance']);
        $this->biography = new Biography($data['biography']);
        $this->work = new Work($data['work']);
        $this->connections = new Connections($data['connections']);
        $this->images = new Images($data['images']);
    }

    /**
     * Return the id of the character
     * @return int
     */
    public function getId(): int { return $this->id; }

    /**
     * Return the name of the character
     * @return string
     */
    public function getName(): string { return $this->name; }

    /**
     * Return the slugged name of the character
     * @return string
     */
    public function getSlug(): string { return $this->slug; }

    /**
     * Return stats of the character
     * @return PowerStats
     */
    public function getPowerStats(): PowerStats { return $this->powerstats; }

    /**
     * Return appearance properties of the character
     * @return Appearance
     */
    public function getAppearance(): Appearance { return $this->appearance; }

    /**
     * Return biography of the character
     * @return Biography
     */
    public function getBiography(): Biography { return $this->biography; }

    /**
     * Return the occupations of the character
     * @return Work
     */
    public function getWork(): Work { return $this->work; }

    /**
     * Return connections of the character
     * @return Connections
     */
    public function getConnections(): Connections { return $this->connections; }

    /**
     * Return character's illustrations
     * @return Images
     */
    public function getImages(): Images { return $this->images; }
}
