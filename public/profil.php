<?php

require '../connect.php';
$bdd = new PDO(DSN,USER, PASS);

if(isset($_GET['id'])){
    $getId = intval($_GET['id']);
    $search = $bdd->prepare('SELECT * FROM members WHERE id=:id');
    $search->bindValue(':id', $_GET['id']);
    $search->execute();
    $userInfo = $search->fetch();

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

<h1>Profil de <?php echo $userInfo['username']?></h1>
<form method="post" action="destroy.php">
    <input type="submit" value="Log Out" class="btn btn-danger">
</form>


</body>
</html>