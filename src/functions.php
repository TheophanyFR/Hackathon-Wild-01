<?php
/**
 * Created by PhpStorm.
 * User: wilder2
 * Date: 06/10/17
 * Time: 05:46
 */

require '../vendor/autoload.php';

function getDateFromTimestamp($games)
{
    $epoch = substr($games->first_release_date, 0, -3);
    $releaseDate = new DateTime("@$epoch");
    // Date format is '20th Nov, 1989'
    echo $releaseDate->format('dS M, Y');
}


function getDev($games)
{
    $client = new GuzzleHttp\Client(['base_uri' => 'https://api-2445582011268.apicast.io/']);
    $devID = $games->developers[0];
    $response = $client->request('GET', 'companies/' . $devID,
        ['headers' => ['user-key' => 'fcd9d20d2b43b91df2d64f9518414e95'],]);
    $devID = json_decode($response->getBody()->getContents());
    echo $devID[0]->name;
}

function getGenre($games)
{
    $client = new GuzzleHttp\Client(['base_uri' => 'https://api-2445582011268.apicast.io/']);
    $genreID1 = $games->genres[0];
    $response = $client->request('GET', 'genres/' . $genreID1,
        ['headers' => ['user-key' => 'fcd9d20d2b43b91df2d64f9518414e95'],]);
    $genreID = json_decode($response->getBody()->getContents());
    echo $genreID[0]->name;
}
