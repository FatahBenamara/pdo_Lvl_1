<?php

//01 Ouverture d'une connexion à la  BDD
$dsn = 'mysql:host=localhost;dbname=agenda';
$user = 'root';
$password = '';
$objetPdo = new PDO($dsn, $user, $password);

//02 preparer la requete insertion

$pdoStat=$objetPdo->prepare('SELECT * FROM contact ORDER BY nom DESC'); 

// 03 Execussion de la requette
$executeOk=$pdoStat -> execute();

// 04 Recuperer des résultats
$contacts = $pdoStat->fetchAll();

// 05 tester
// test 01

var_dump($contacts);
// $_GET('select.php') chercher les resultat par URL

?> 
<!-- test 02 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>liste des contacts </h1>
    <ul>
        <?php   foreach ($contacts as $contact):    ?> 
            <li>  
                <?= $contact['nom'] ?> 
                <?= $contact['prenom'] ?> 
                <?= $contact['tel'] ?> 
                <?= $contact['mel'] ?> 
               <!--06  Ajouter un lien pour supprimer  <a href="delete.php">Supprimer</a>-->
               <a href="delete.php?numContact=<?= $contact['id_contact'] ?>">Supprimer</a> <!--07 Ajouter un parametre GET  -->
               <!--08  Ajouter un lien pour modifier  <a href="updateForm.php">Modifier</a>-->
               <a href="updateForm.php?numContact=<?= $contact['id_contact'] ?>">Modifier</a> <!--09 Ajouter un parametre GET  -->
            </li>
        <?php   endforeach;    ?>
    </ul>
</body>
</html>







