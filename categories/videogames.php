<?php



include "../public/header.php";
include "../src/functions.php";

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

?>
<?php for ($i=0; $i <= 5; $i ++) : ?>
    <section class="videogames">
        <div class="container">
            <div class="row">
                <div class="media">
                    <div class="media-left">
                        <a href="#">
                            <img class="media-object" src=<?= setGameCover($games[$i]->cover->cloudinary_id)?>>
                        </a>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading"><?= $games[$i]->name;?></h4>
                        <p><?=getDateFromTimestamp($games[$i])?></p>
                        <p><?=getDev($games[$i])?></p>
                        <p><?=getGenre($games[$i])?></p>
                        <p><?=$games[$i]->summary;?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endfor; ?>

<?php

include "../public/footer.php";

?>
