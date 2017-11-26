<?php

include '../public/header.php';

require '../connect.php';
$bdd = new PDO(DSN,USER, PASS);

$favorite=$_POST['addition'];

if($_POST['addition']){
        $insertFavorite = $bdd->prepare("UPDATE members SET favorite = $favorite");
        $insertFavorite->bindParam("favorite", $favorite);
        if (!$insertFavorite->execute()) {
            var_dump($bdd->errorInfo());
            die();
        }
}

?>
<?php
require '../vendor/autoload.php';
ini_set('xdebug.var_display_max_depth', 5);
ini_set('xdebug.var_display_max_children', 256);
ini_set('xdebug.var_display_max_data', 1024);

$betaseries = new \Betaseries\Betaseries('25311bd4dd6e', 'TOKEN_UTILISATEUR');
$client = new \Betaseries\Client($betaseries);

$movies = $client->api('movies')->search($_GET['search']);


//echo $movies['movies'][0]['title'] . '<br>';
//echo $movies['movies'][0]['genres'][0] . ' - ' . $movies['movies'][0]['genres'][1] . '<br>';
//echo $movies['movies'][0]['poster'] . '<br>' . $movies['movies'][0]['release_date'] . '<br>';
//echo $movies['movies'][0]['director'] . '<br>' . $movies['movies'][0]['synopsis'];

?>

<?php foreach ($movies['movies'] as $value) : ?>
    <section class="movie">
        <div class="container">
            <div class="row">
                <div class="media">
                    <div class="media-left">
                        <a href="#">
                            <img class="media-object" src="<?=$value['poster'] ?? "../src/images/logo.png"?>">
                        </a>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading"><?= $value['title'];?></h4>
                        <p><?=$value['release_date'];?></p>
                        <p><?=$value['director'];?></p>
                        <p><?=$value['genres'][0] . ' - ' . $value['genres'][1];?></p>
                        <p><?=$value['synopsis'];?></p>
                        <form method="POST">
                            <input name="addition" type="hidden" value="<?=$value['id'];?>">
                            <button type="submit" class="btn btn-default">Add favorite</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endforeach; ?>

<?php

include '../public/footer.php';

?>
