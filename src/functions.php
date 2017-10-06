<?php
/**
 * Created by PhpStorm.
 * User: wilder2
 * Date: 06/10/17
 * Time: 05:46
 */

function getDateFromTimestamp($array) {
    $epoch = substr($array->first_release_date, 0, -3);
    $releaseDate = new DateTime("@$epoch");
    // Date format is '20th Nov, 1989'
    echo $releaseDate->format('dS M, Y');
}
