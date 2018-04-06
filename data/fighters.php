<?php
    header('Content-Type: application/json');
    require('../vendor/autoload.php');

    if (empty($_GET['ids']))
        die(json_encode(['error' => 'Please specify fighters ids.']));

    $ids = json_decode($_GET['ids']);
    $fighters = [];

    $api = new App\SuperHeroes\Api();

    foreach ($ids as $id) {
        $fighter = $api->getCharacter($id);
        $fighters[$fighter->getId()] = [
            'id' => $fighter->getId(),
            'name' => $fighter->getName(),
            'image' => $fighter->getImages()->getLg(),
            'stats' => [
                'combat' => $fighter->getPowerStats()->getCombat(),
                'speed' => $fighter->getPowerStats()->getSpeed(),
                'strength' => $fighter->getPowerStats()->getStrength(),
                'power' => $fighter->getPowerStats()->getPower(),
                'durability' => $fighter->getPowerStats()->getDurability(),
                'intelligence' => $fighter->getPowerStats()->getIntelligence()
            ]
        ];
    }

    echo json_encode($fighters);