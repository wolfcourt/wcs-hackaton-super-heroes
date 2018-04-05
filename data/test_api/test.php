<?php
require '../../vendor/autoload.php';

$client = new GuzzleHttp\Client([
       'base_uri' => 'https://cdn.rawgit.com/akabab/superhero-api/0.2.0/api/id/',
   ]
);

//$request = $client->request('GET', '1.json');
//var_dump($request);

$body = $response->getBody();
echo $body->getContents();
