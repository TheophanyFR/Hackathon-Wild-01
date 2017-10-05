<?php
/**
 * Created by PhpStorm.
 * User: noclain
 * Date: 03/10/17
 * Time: 09:50
 */

require '../vendor/autoload.php';
// Create a client with a base URI
$client = new GuzzleHttp\Client([
        'base_uri' => 'https://foo.com/api/',
    ]
);
