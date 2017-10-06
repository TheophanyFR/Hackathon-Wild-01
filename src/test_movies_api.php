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

$movies = $client->api('movies')->search('alien');

echo $movies['movies'][0]['title'] . '<br>';
echo $movies['movies'][0]['genres'][0] . ' - ' . $movies['movies'][0]['genres'][1] . '<br>';
echo $movies['movies'][0]['poster'] . '<br>' . $movies['movies'][0]['release_date'] . '<br>';
echo $movies['movies'][0]['director'] . '<br>' . $movies['movies'][0]['synopsis'];

?>

<?php for ($i=0; $i <= 5; $i ++) : ?>
    <section class="movie">
        <div class="container">
            <div class="row">
                <div class="media">
                    <div class="media-left">
                        <a href="#">
                            <img class="media-object" src="https://images.igdb.com/igdb/image/upload/t_cover_big/<?=$movies[$i]->poster?>.jpg">
                        </a>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading"><?= $movies[$i]->title;?></h4>
                        <p><?=$movies[$i]->synopsis;?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endfor; ?>

<?php

include '../public/footer.php';

?>
