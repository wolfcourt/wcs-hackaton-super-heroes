<?php
/**
 * Created by PhpStorm.
 * User: wilder14
 * Date: 05/04/18
 * Time: 15:45
 */
require '../vendor/autoload.php';

$api = new App\SuperHeroes\Api();
echo $api->getClient();
echo $request->request('GET','id/1.json');
echo $body->getBody();

