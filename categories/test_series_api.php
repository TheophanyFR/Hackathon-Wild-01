<?php
include '../public/header.php';

require '../vendor/autoload.php';
ini_set('xdebug.var_display_max_depth', 5);
ini_set('xdebug.var_display_max_children', 256);
ini_set('xdebug.var_display_max_data', 1024);

$betaseries = new \Betaseries\Betaseries('25311bd4dd6e', 'TOKEN_UTILISATEUR');
$client = new \Betaseries\Client($betaseries);


// research on a show

$show = $client->api('shows')->search($_GET['search']);


/**
 * returned infos
 * types : title, images, description, seasons, creation, genres
 */

//echo $show['shows'][0]['title'] . '<br>' . $show['shows'][0]['description'] . '<br>' . $show['shows'][0]['seasons']
// . '<br/>' . $show['shows'][0]['creation'] . '<br>';
//echo $show['shows'][0]['images']['banner'] . '<br>';
//echo $show['shows'][0]['genres'][0] . ' - ' . $show['shows'][0]['genres'][1] ;

?>

<?php for ($i=0; $i <= 5; $i ++) : ?>
 <section class="movie">
  <div class="container">
   <div class="row">
    <div class="media">
     <div class="media-left">
      <a href="#">
       <img class="media-object" src="<?=$show['shows'][$i]['images']['poster']?>">
      </a>
     </div>
     <div class="media-body">
      <h4 class="media-heading"><?=$show['shows'][$i]['title']?></h4>
         <p><?$show['shows'][$i]['creation'];?></p>
         <p><?="Season numbers " . $show['shows'][$i]['seasons'];?></p>
         <p><?=$show['shows'][$i]['genres'][0] . ' - ' . $show['shows'][$i]['genres'][1];?></p>
      <p><?=$show['shows'][$i]['description']?></p>
         <form method="GET">
             <button name="addition" type="submit" class="btn btn-default">Add favorite</button>
         </form>
     </div>
    </div>
   </div>
  </div>
 </section>
<?php endfor; ?>

<?php

include '../public/footer.php';

?>















