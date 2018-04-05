<?php
namespace App\SuperHeroes;
require __DIR__ . '/../../vendor/autoload.php';

use GuzzleHttp\Client;

class Api {
    const BASE_URI = 'https://cdn.rawgit.com/akabab/superhero-api/0.2.0/api/';

    /** @var Client */
    private $httpClient = null;

    /**
     * Return the active Guzzle client
     * @return Client
     */
    public function getClient() : Client
    {
        if (empty($this->httpClient)) {
            $this->httpClient = new Client([
                'base_uri' => self::BASE_URI
            ]);
        }
        return $this->httpClient;
    }
}