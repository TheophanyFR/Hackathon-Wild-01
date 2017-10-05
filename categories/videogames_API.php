<?php
/**
 * Created by PhpStorm.
 * User: noclain
 * Date: 03/10/17
 * Time: 09:50
 */
ini_set('xdebug.var_display_max_depth', 5);
ini_set('xdebug.var_display_max_children', 256);
ini_set('xdebug.var_display_max_data', 1024);
require '../vendor/autoload.php';
// Create a client with a base URI
$client = new GuzzleHttp\Client(['base_uri' => 'https://api-2445582011268.apicast.io/']);

// Query game per name
$game = 'transistor';

// Query, returns a string
$response = $client->request('GET', 'games/?search=' . $game . '&fields=*',
    ['headers' => ['user-key' => 'fcd9d20d2b43b91df2d64f9518414e95'],]);

// Transforms the string into a multidimensional array
$games = json_decode($response->getBody()->getContents());

//var_dump($games);

// Echoes specific value (0 means first match from query, name returns the value stored at the line with the key 'name')
//echo $games[0]->name;


// Query the first two genres using their id collected by the game query
$genreID1 = $games[0]->genres[0];
$genreID2 = $games[0]->genres[1];

$response = $client->request('GET', 'genres/' . $genreID1 . ',' . $genreID2,
    ['headers' => ['user-key' => 'fcd9d20d2b43b91df2d64f9518414e95'],]);

$genreID = json_decode($response->getBody()->getContents());

// Echoes the first two genres
echo $genreID[0]->name . ' - ' . $genreID[1]->name;
