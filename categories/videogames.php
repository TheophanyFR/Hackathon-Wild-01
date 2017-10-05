<?php
/**
 * Created by PhpStorm.
 * User: noclain
 * Date: 03/10/17
 * Time: 09:50
 */

require '../vendor/autoload.php';
// Create a client with a base URI
$client = new GuzzleHttp\Client(['base_uri' => 'https://api-2445582011268.apicast.io/']);

$response = $client->request('GET', 'characters/1', ['headers' =>
    ['user-key' => 'fcd9d20d2b43b91df2d64f9518414e95'],
    ]);

var_dump($response->getBody()->getContents());
