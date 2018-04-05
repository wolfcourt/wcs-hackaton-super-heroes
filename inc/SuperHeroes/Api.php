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

    private function getJSON(string $path): array
    {
        try {
            $req = $this->getClient()->request('GET', $path);
            return json_decode($req->getBody(), true);
        } catch (GuzzleException $e) {
            die($e);
        }
    }

    public function getAllCharacters(): array
    {
        $data = $this->getJSON('all.json');
        $characters = [];
        foreach ($data AS $row)
            $characters[] = new Character($row['id']);
        return $characters;
    }

    public function getCharacter(int $characterId): Character
    {
        $data = $this->getJSON("id/$characterId.json");
        return new Character($data);
    }

    public function getPowerStats(int $characterId): PowerStats
    {
        $data = $this->getJSON("powerstats/$characterId.json");
        return new PowerStats($data);
    }

    public function getAppearance(int $characterId): Appearance
    {
        $data = $this->getJSON("appearance/$characterId.json");
        return new Appearance($data);
    }

    public function getBiography(int $characterId): Biography
    {
        $data = $this->getJSON("biography/$characterId.json");
        return new Biography($data);
    }

    public function getConnections(int $characterId): Connections
    {
        $data = $this->getJSON("connections/$characterId.json");
        return new Connections($data);
    }

    public function getWork(int $characterId): Work
    {
        $data = $this->getJSON("work/$characterId.json");
        return new Work($data);
    }
}