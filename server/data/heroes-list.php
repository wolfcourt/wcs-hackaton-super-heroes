<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    require '../vendor/autoload.php';

    use App\SuperHeroes\Api;

    $api = new Api();

    $characters = $api->getAllCharacters();
    shuffle($characters);
    $dataToSend = [];

    foreach ($characters AS $character) {
        $dataToSend[] = [
            'id' => $character->getId(),
            'name' => $character->getName(),
            'slug' => $character->getSlug(),
            'image' => $character->getImages()->getSm(),
        ];
    }

    echo json_encode($dataToSend);