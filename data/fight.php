<?php
header('Content-Type: application/json');
require '../vendor/autoload.php';

use App\SuperHeroes\Api;

if(empty($_GET['playerOneId']) || empty($_GET['playerTwoId']))
    die(json_encode(['error' => 'Please specify valid player ids']));

$api = new Api();

$playerOne = $api->getCharacter($_GET['playerOneId']);
$playerTwo = $api->getCharacter($_GET['playerTwoId']);

$playerOneLife = 100;
$playerTwoLife = 100;

$turns = [];

while ($playerOneLife > 0 and $playerTwoLife > 0){
    $playerOneStrength= $playerOne->getPowerStats()->getStrength();
    $playerTwoStrength= $playerTwo->getPowerStats()->getStrength();

    $playerOnePower= $playerOne->getPowerStats()->getPower();
    $playerTwoPower= $playerTwo->getPowerStats()->getPower();

    $playerOneCombat= $playerOne->getPowerStats()->getCombat();
    $playerTwoCombat= $playerTwo->getPowerStats()->getCombat();

    $playerOneDurability= $playerOne->getPowerStats()->getDurability();
    $playerTwoDurability= $playerTwo->getPowerStats()->getDurability();

    $playerOneSpeed= $playerOne->getPowerStats()->getSpeed();
    $playerTwoSpeed= $playerTwo->getPowerStats()->getSpeed();

    $playerOneIntel= $playerOne->getPowerStats()->getIntelligence();
    $playerTwoIntel= $playerTwo->getPowerStats()->getIntelligence();

    $playerOneAlignement= $playerOne->getBiography()->getAlignment();
    $playerTwoAlignement= $playerTwo->getBiography()->getAlignment();


    $playerOneDefense= abs(round(($playerOneCombat * 0.15) + (($playerOneSpeed + $playerOneIntel) * 0.35) + $playerOneDurability));
    $playerTwoDefense= abs(round(($playerTwoCombat * 0.15) + (($playerTwoSpeed + $playerTwoIntel) * 0.35) + $playerTwoDurability));

    $playerOneAttack= abs(round(($playerOneSpeed * 0.15) + (($playerOnePower + $playerOnePower) * 0.25) + $playerOneStrength));
    $playerTwoAttack= abs(round(($playerTwoSpeed * 0.15) + (($playerTwoPower + $playerTwoPower) * 0.25) + $playerTwoStrength));


    if($playerOneAlignement == 'bad' and $playerTwoAlignement =='bad'){
        $playerOneDefense = $playerOneDefense * 1.35;
        $playerTwoDefense = $playerTwoDefense * 1.35;
    }


    $playerOneDmg = abs($playerOneAttack - $playerTwoDefense);
    $playerTwoDmg = abs($playerTwoAttack - $playerOneDefense);


    if($playerOneAlignement == 'good' and $playerTwoAlignement =='good'){
        $playerOneDmg = $playerOneDmg * 0.75;
        $playerTwoDmg = $playerTwoDmg * 0.75;
    }

    if($playerOneAlignement == 'bad' and $playerTwoAlignement =='bad'){
        $playerOneDmg = $playerOneDmg * 1.2;
        $playerTwoDmg = $playerTwoDmg * 1.2;
    }
    $playerOneLife = $playerOneLife - $playerTwoDmg;
    $playerTwoLife = $playerTwoLife - $playerOneDmg;


    $turns[] = [
        'playerOne' => [
            'damage' => $playerOneDmg,
            'life' => $playerOneLife,
        ],
        'playerTwo' => [
            'Damage' => $playerTwoDmg,
            'Life' => $playerTwoLife,
        ],
    ];
}

echo json_encode([
    'turns' => $turns
]);