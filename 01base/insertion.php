<?php
//00 creer la base de donné: Agenda
//01 tester que $_POST fonctionne
// var_dump($_POST);

//02 Ouverture d'une connexion à la  BDD
$dsn = 'mysql:host=localhost;dbname=agenda';
$user = '***t';
$password = '';
$objetPdo = new PDO($dsn, $user, $password);

//03 preparer la requete insertion

$pdoStat=$objetPdo->prepare('INSERT INTO contact VALUES (NUll,:nom, :prenom, :tel , :mel)'); // preparer les ID des input de forms

// 04 lier chaque marqueur ($_POST['name']) à une valeur (ID)

$pdoStat ->bindValue(':nom', $_POST['lastname'], PDO::PARAM_STR);
$pdoStat ->bindValue(':prenom', $_POST['firstname'], PDO::PARAM_STR);
$pdoStat ->bindValue(':tel', $_POST['phone'], PDO::PARAM_STR);
$pdoStat ->bindValue(':mel', $_POST['mail'], PDO::PARAM_STR);

// 05 Execussion de la requette
$pdoStat -> execute();

// 06 tester avec un boolean
$insertOk = $pdoStat -> execute(); // generer la condition
if ($insertOk) {
    $message = "le contacte a été ajouter dans la BDD";
} else {
    $message = "echec dans l'insertion";
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
    
<h1> Insertion des contactes</h1>
<p> <?php echo $message ?> </p>
</body>
</html>


