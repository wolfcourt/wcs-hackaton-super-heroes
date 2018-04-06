<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    require '../vendor/autoload.php';

    use App\SuperHeroes\Api;

    $cacheFile = __DIR__ . '/cache/selection.json';
    if (file_exists($cacheFile))
        die(file_get_contents($cacheFile));

    $api = new Api();

    $characters = $api->getAllCharacters();
    shuffle($characters);
    $dataToSend = [];

    foreach ($characters AS $character) {
        $dataToSend[] = [
            'id' => $character->getId(),
            'name' => $character->getName(),
            'slug' => $character->getSlug(),
            'image' => $character->getImages()->getLg(),
        ];
        if(count($dataToSend) === 30) break;
    }

    file_put_contents($cacheFile, json_encode($dataToSend));
    echo json_encode($dataToSend);