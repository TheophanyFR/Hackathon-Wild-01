<?php
include '../public/header.php';

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
 . '<br/>' . $show['shows'][0]['creation'] . '<br>';
echo $show['shows'][0]['images']['banner'] . '<br>';
echo $show['shows'][0]['genres'][0] . ' - ' . $show['shows'][0]['genres'][1] ;

?>

<?php for ($i=0; $i <= 5; $i ++) : ?>
 <section class="movie">
  <div class="container">
   <div class="row">
    <div class="media">
     <div class="media-left">
      <a href="#">
       <img class="media-object" src="https://images.igdb.com/igdb/image/upload/t_cover_big/<?=$show[$i]->cover->cloudinary_id?>.jpg">
      </a>
     </div>
     <div class="media-body">
      <h4 class="media-heading"><?= $show[$i]->title;?></h4>
      <p><?=$show[$i]->summary;?></p>
     </div>
    </div>
   </div>
  </div>
 </section>
<?php endfor; ?>

<?php

include '../public/footer.php';

?>















