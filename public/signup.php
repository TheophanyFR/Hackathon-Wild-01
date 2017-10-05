<?php

require '../connect.php';
$bdd = new PDO(DSN,USER, PASS);

if($_POST){
    $errors = array();

    $username = $_POST['username'];
    if(empty ($username)){
        $errors['username1'] = "Cant be empty";
    }

    $password = $_POST['password'];
    if(empty ($password)){
        $errors['password1'] = "Please, enter a password";
    }

    $confirmation = $_POST['confirmation'];
    if(empty ($_POST['confirmation'])){
        $errors['confirmation1'] = "Please, confirm your password";
    }

    if($password != $confirmation) {
        $errors['confirmation2'] = "Does not match with your password";
    }


    if(count($errors)==0){
        $insertMember = $bdd->prepare("INSERT INTO members(username,password) VALUES (:username, :password)");
        $insertMember->bindParam("username", $username);
        $insertMember->bindParam("password", $password);
        $insertMember->execute();
        header('location:index.php');

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

<h1>Sign in</h1>

<form class="form-horizontal" method="post" action="">

    <div class="form-group">
        <label class="control-label col-sm-2" for="username">Id :</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="username" name="username" placeholder="Enter your name" value="<?php if(isset($_POST['username'])) echo $_POST['username'];?>">
        </div>
        <p><?php if(isset($errors['username1'])) echo $errors['username1'];?></p>
    </div>


    <div class="form-group">
        <label class="control-label col-sm-2" for="password">Password:</label>
        <div class="col-sm-10">
        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" value="<?php if(isset($_POST['user_phone'])) echo $_POST['user_phone'];?>">
        </div>
        <p><?php if(isset($errors['password1'])) echo $errors['password1'];?></p>
    </div>

    <div class="form-group">
        <label class="control-label col-sm-2" for="confirmation">Confirm password:</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" id="confirmation" name="confirmation" placeholder="Confirm your password">
        </div>
        <p><?php if(isset($errors['confirmation1'])) echo $errors['confirmation1'];?></p>
        <p><?php if(isset($errors['confirmation2'])) echo $errors['confirmation2'];?></p>
    </div>


    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <input type="submit" name="suscribe" value="Send">
        </div>
    </div>

</form>


</body>
</html>