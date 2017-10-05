<?php
include '../public/header.php';
?>
<?php
require '../vendor/autoload.php';
ini_set('xdebug.var_display_max_depth', 5);
ini_set('xdebug.var_display_max_children', 256);
ini_set('xdebug.var_display_max_data', 1024);

$betaseries = new \Betaseries\Betaseries('25311bd4dd6e', 'TOKEN_UTILISATEUR');
$client = new \Betaseries\Client($betaseries);


// research on a show

$show = $client->api('shows')->search('breaking_bad');


/**
 * returned infos
 * types : title, images, description, seasons, creation, genres
 */

echo $show['shows'][0]['title'] . '<br>' . $show['shows'][0]['description'] . '<br>' . $show['shows'][0]['seasons']
 . '<br>' . $show['shows'][0]['creation'] . '<br>';
echo $show['shows'][0]['images']['banner'] . '<br>';
echo $show['shows'][0]['genres'][0] . ' - ' . $show['shows'][0]['genres'][1] ;








?>
















