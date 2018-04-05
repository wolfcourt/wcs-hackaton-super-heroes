<?php
    header('Content-Type: application/json');
    require '../vendor/autoload.php';

    use App\SuperHeroes\Api;

    $api = new Api();
    $characters = $api->getAllCharacters();
    $dataToSend = [];

    foreach ($characters AS $character) {
        $dataToSend[] = [
            'id' => $character->getId(),
            'name' => $character->getName(),
            'slug' => $character->getSlug(),
            'image' => $character->getImages()->getLg(),
        ];
        if(count($dataToSend) === 15) break;
    }

    echo json_encode($dataToSend);