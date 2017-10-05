<?php

session_start();

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

<!DOCTYPE html>

<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mediatheque</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
</head>

<body>

<h1>Connexion</h1>

<form class="form-horizontal" method="post" action="">

    <div class="form-group">
        <label class="control-label col-sm-2" for="userConnect">Id :</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="userConnect" name="userConnect" placeholder="Enter your name">
        </div>



    <div class="form-group">
        <label class="control-label col-sm-2" for="passwordConnect">Password:</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" id="passwordConnect" name="passwordConnect" placeholder="Enter your password">
        </div>
    </div>


    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <input type="submit" name="connexion" value="Connexion">
        </div>
    </div>

</form>


</body>
</html>