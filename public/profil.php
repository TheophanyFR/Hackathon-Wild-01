<?php

session_start();

include 'header.php';

require '../connect.php';

$bdd = new PDO(DSN,USER, PASS);

if(isset($_GET['id'])){
    $getId = intval($_GET['id']);
    $search = $bdd->prepare('SELECT * FROM members WHERE id=:id');
    $search->bindValue(':id', $_GET['id']);
    $search->execute();
    $userInfo = $search->fetch();
    setcookie('id',$_GET['username'], (time()+3600));
}
else {
    header('Location: login.php');
}

?>

    <section class="profil">
        <div class="container">
            <div class="row">
                <div class="col-lg-offset-5 col-lg-3">
                    <img src="../src/images/profil.jpeg">
                    <h1>Profil de <?php echo $userInfo['username']?></h1>
                    <form method="post" action="destroy.php">
                        <input type="submit" value="Log Out" class="btn btn-danger">
                    </form>
                    <h4>Profil description</h4>
                    <table class="table table-striped">
                        <thead>Movie</thead>
                        <tr>
                            <th>Favorite</th>
                            <th>Not see Yet</th>
                        </tr>
                        <tr>
                            <td>Rocky</td>
                            <td>Green-zone</td>
                        </tr>
                        <tr>
                            <td>Lord of the ring</td>
                            <td>Slider</td>
                        </tr>
                    </table>

                    <table class="table table-striped">
                        <thead>TV-Show</thead>
                        <tr>
                            <th>Favorite</th>
                            <th>Not see Yet</th>
                        </tr>
                        <tr>
                            <td>Lost</td>
                            <td>Gotham</td>
                        </tr>
                        <tr>
                            <td>X-files</td>
                            <td>One-punch-man</td>
                        </tr>
                    </table>

                    <table class="table table-striped">
                        <thead>Video-game</thead>
                        <tr>
                            <th>Favorite</th>
                            <th>Not see Yet</th>
                        </tr>
                        <tr>
                            <td>Metal Gear</td>
                            <td>Elder Scroll</td>
                        </tr>
                        <tr>
                            <td>Lord of the ring</td>
                            <td>GTA V</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </section>



<?php

include 'footer.php';

?>