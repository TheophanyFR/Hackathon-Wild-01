<?php

session_start();

include 'header.php';


require '../connect.php';
$bdd = new PDO(DSN,USER, PASS);

if($_POST) {

    $userConnect = $_POST['userConnect'];
    $passwordConnect = $_POST['passwordConnect'];

    if (!empty($userConnect) AND !empty($passwordConnect)) {
        $search = $bdd->prepare("SELECT * FROM members WHERE username=:username AND password=:password");
        $search->bindValue(':username', $userConnect);
        $search->bindValue(':password',$passwordConnect);
        $search->execute();


        $userExist = $search->rowCount();
        if ($userExist == 1) {
            $userInfo = $search->fetch();
            $_SESSION['id'] = $userInfo['id'];
            $_SESSION['username'] = $userInfo['username'];
            header('location:profil.php?id=' . $_SESSION['id']);
        } else {
            echo 'Cannot find you';
        }
    }
}

?>

    <section class="login">
        <div class="container">
            <div class="row">
                <div class="col-lg-offset-4 col-lg-5"
            <h1>Connexion</h1>
            <form class="form-horizontal" method="post" action="">
                <div class="form-group">
                    <label class="control-label col-sm-2" for="userConnect">Id :</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-controls" id="userConnect" name="userConnect" placeholder="Enter your name">
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="passwordConnect">Password:</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="passwordConnect" name="passwordConnect" placeholder="Enter your password">
                        </div>
                    </div>
                    <a class="createnew" href="signup.php">Create a new acount !</a>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input type="submit" name="connexion" value="Connexion" class="btn btn-default">
                        </div>
                    </div>

            </form>
            </div>
            </div>
    </section>
<?php

include 'footer.php';


?>