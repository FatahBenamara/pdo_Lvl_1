<?php


//01 Ouverture d'une connexion à la  BDD
$dsn = 'mysql:host=localhost;dbname=agenda';
$user = 'root';
$password = '';
$objetPdo = new PDO($dsn, $user, $password);

//02 preparer la requete insertion
$pdoStat=$objetPdo->prepare('DELETE FROM contact WHERE id_contact=:num LIMIT 1' ); // num est un marqueur

// 03 lier le marqueur (num) à une valeur (GET)
$pdoStat ->bindValue(':num', $_GET['numContact'], PDO::PARAM_INT);

// 04 Execussion de la requette
$pdoStat -> execute();

// 06 tester avec un boolean
$deleteOk = $pdoStat -> execute(); // generer la condition
if ($deleteOk) {
    $message = "le contacte a été supprimer dans la BDD";
} else {
    $message = "echec de la supprission du contact";
}

?> 

<!-- generer un html -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<h1> Suppression du contactes</h1>
<p> <?php echo $message ?> </p>
</body>
</html>