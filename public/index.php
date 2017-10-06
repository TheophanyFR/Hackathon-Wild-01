<?php
include 'header.php';


require '../vendor/autoload.php';
// Create a client with a base URI
$client = new GuzzleHttp\Client(['base_uri' => 'https://api-2445582011268.apicast.io/']);

// Query value
$games = $_GET['search'];

// Query, returns a string
$response = $client->request('GET', 'games/?search=' . $games . '&fields=*',
    ['headers' => ['user-key' => 'fcd9d20d2b43b91df2d64f9518414e95'],]);

// Transforms the string into a multidimensional array
$games = json_decode($response->getBody()->getContents());

require '../vendor/autoload.php';
ini_set('xdebug.var_display_max_depth', 5);
ini_set('xdebug.var_display_max_children', 256);
ini_set('xdebug.var_display_max_data', 1024);

$betaseries = new \Betaseries\Betaseries('25311bd4dd6e', 'TOKEN_UTILISATEUR');
$client = new \Betaseries\Client($betaseries);

$movies = $client->api('movies')->search($_GET['search']);

?>

    <body>
    <section>
            <div class="jumbotron">
                    <div class="container">
                        <h1>Hello, Fan</h1>
                        <p>Welcome on your favorite website. You can control your own Culture !</p>
                        <p><a class="btn btn-primary btn-lg" href="profil.php" role="button">Your Culture</a></p>
                    </div>
            </div>
    </section>
    <section class="tuile">
        <div class="container">
            <div class="row">
                <div class="col-lg-offset-4 col-lg-6">
                    <div class="page-header">
                        <h1>Actuality <small>Cutlure change everyday</small></h1>
                    </div>
                </div>
            </div>
            <div class="row">
            <?php for ($i=0; $i <= 3; $i ++) : ?>
                <div class="col-xs-6 col-md-3">
                    <a href="#" class="thumbnail">
                        <img class="media-object" src="https://images.igdb.com/igdb/image/upload/t_cover_big/<?=$games[$i]->cover->cloudinary_id?>.jpg">
                    </a>
                    <div class="caption">
                        <h4 class="media-heading"><?= substr(htmlentities($games[$i]->name), 0, 12);?></h4>
                        <p><?= substr(htmlentities($games[$i]->summary), 0, 100).'...' ?></p>
                        <p><a href="#" class="btn btn-primary" role="button">I see this media</a><a href="#" class="btn btn-default" role="button">Not see yet</a></p>
                    </div>
                </div>
            <?php endfor; ?>
            </div>
                <div class="row">
                    <?php for ($i=0; $i <= 3; $i ++) : ?>
                        <div class="col-xs-6 col-md-3">
                            <a href="#" class="thumbnail">
                                <img class="media-object" src="<?=$movies['movies'][$i]['poster']?>">
                            </a>
                            <div class="caption">
                                <h4 class="media-heading"><?= substr(htmlentities($movies['movies'][$i]['title']), 0, 12);?></h4>
                                <p><?= substr(htmlentities($movies['movies'][$i]['synopsis']), 0, 100).'...' ?></p>
                                <p><a href="#" class="btn btn-primary" role="button">I see this media</a><a href="#" class="btn btn-default" role="button">Not see yet</a></p>
                            </div>
                        </div>
                    <?php endfor; ?>
                </div>
        </div>
    </section>
<?php
include 'footer.php';
?>