<?php


//01 Ouverture d'une connexion à la  BDD
$dsn = 'mysql:host=localhost;dbname=agenda';
$user = 'root';
$password = '';
$objetPdo = new PDO($dsn, $user, $password);

//02 preparer la requete insertion
$pdoStat=$objetPdo->prepare('SELECT * FROM contact WHERE id_contact=:num' ); // num est un marqueur

// 03 lier le marqueur (num) à une valeur (GET)
$pdoStat ->bindValue(':num', $_GET['numContact'], PDO::PARAM_INT);

// 04 Execussion de la requette
$updateFormOk = $pdoStat -> execute();

// 05 recuperer le contact
$contact = $pdoStat->fetch();

// 06 tester
// test 01

var_dump($contact);
// $_GET('select.php') chercher les resultat par URL
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form modification</title>
</head>
<body>
    <h1>Modifier un contact</h1>
    <form action="modifier.php" method="post"> 
   <!-- 07 creer numContact -->
        <input type="text" name="numContact" value="<?=  $contact['id_contact'];     ?> ">

        <div>
            <p>
                <label for="nom">Nom</label>
                <input  id="nom" type="text" name="firstname" value="<?=  $contact['nom'];     ?> ">
            </p>
            <p>
                <label for="prenom">Prenom</label>  
                <input  id="prenom" type="text" name="lastname" value="<?=$contact['prenom'];     ?> ">

            </p>
            <p>
                <label for="tel">téléphone</label>    
                <input  id="tel" type="text" name="phone" value="<?=  $contact['tel'] ;    ?> ">

            </p>
            <p>
                <label for="mel">Adresse éléctronique</label>    
                <input  id="mel" type="email" name="mail" value="<?=  $contact['mel'];     ?> ">

            </p>
            <p>
                <input type="submit" value="Enregistrer les modifications" >

            </p>
        </div>
    </form>

</body>
</html>

