<?php
namespace App\SuperHeroes;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class Api {
    const BASE_URI = 'https://cdn.rawgit.com/akabab/superhero-api/0.2.0/api/';

    /** @var Client */
    private $httpClient = null;

    /**
     * Return the active Guzzle client
     * @return Client
     */
    private function getClient(): Client
    {
        if (empty($this->httpClient)) {
            $this->httpClient = new Client([
                'base_uri' => self::BASE_URI
            ]);
        }
        return $this->httpClient;
    }

    /**
     * Return a json parsed object of a request
     * @param string $path
     * @return array
     */
    private function getJSON(string $path): array
    {
        try {
            $req = $this->getClient()->request('GET', $path);
            return json_decode($req->getBody(), true);
        } catch (GuzzleException $e) {
            die($e);
        }
    }

    /**
     * Return list of all characters
     * @return Character[]
     */
    public function getAllCharacters(): array
    {
        $data = $this->getJSON('all.json');
        $characters = [];
        foreach ($data AS $row)
            $characters[] = new Character($row['id']);
        return $characters;
    }

    /**
     * Return a specific character
     * @param int $characterId
     * @return Character
     */
    public function getCharacter(int $characterId): Character
    {
        $data = $this->getJSON("id/$characterId.json");
        return new Character($data);
    }

    /**
     * Return stats of a character
     * @param int $characterId
     * @return PowerStats
     */
    public function getPowerStats(int $characterId): PowerStats
    {
        $data = $this->getJSON("powerstats/$characterId.json");
        return new PowerStats($data);
    }

    /**
     * Return appearance class of a character
     * @param int $characterId
     * @return Appearance
     */
    public function getAppearance(int $characterId): Appearance
    {
        $data = $this->getJSON("appearance/$characterId.json");
        return new Appearance($data);
    }

    /**
     * Return the biography of a character
     * @param int $characterId
     * @return Biography
     */
    public function getBiography(int $characterId): Biography
    {
        $data = $this->getJSON("biography/$characterId.json");
        return new Biography($data);
    }

    /**
     * Return connections of a character
     * @param int $characterId
     * @return Connections
     */
    public function getConnections(int $characterId): Connections
    {
        $data = $this->getJSON("connections/$characterId.json");
        return new Connections($data);
    }

    /**
     * Return work of a character
     * @param int $characterId
     * @return Work
     */
    public function getWork(int $characterId): Work
    {
        $data = $this->getJSON("work/$characterId.json");
        return new Work($data);
    }
}