<?php


//01 Ouverture d'une connexion à la  BDD
$dsn = 'mysql:host=localhost;dbname=agenda';
$user = 'root';
$password = '';
$objetPdo = new PDO($dsn, $user, $password);

//02 preparer la requete insertion
$pdoStat=$objetPdo->prepare('UPDATE contact SET nom=:nom, prenom=:prenom, tel=:tel , mel=:mel WHERE id_contact=:num LIMIT 1 ' ); // num est un marqueur

// 03 lier le marqueur () à une valeur (POST)
$pdoStat ->bindValue(':num', $_POST['numContact'], PDO::PARAM_INT);
$pdoStat ->bindValue(':nom', $_POST['firstname'], PDO::PARAM_STR);
$pdoStat ->bindValue(':prenom', $_POST['lastname'], PDO::PARAM_STR);
$pdoStat ->bindValue(':tel', $_POST['phone'], PDO::PARAM_STR);
$pdoStat ->bindValue(':mel', $_POST['mail'], PDO::PARAM_STR);
var_dump($pdoStat);

// 04 Execussion de la requette
$pdoStat -> execute();

// 05 teste
$modifierOk = $pdoStat -> execute();
if ($modifierOk) {
    $message = "le contenu a été mis a jour";
}else{
    $message = "echec de la mise à jour du contact";
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification: Resultat</title>
</head>
<body>
    <h1>Resultat de la modification</h1>
    <p><?= $message ?> </p>

</body>
</html>

