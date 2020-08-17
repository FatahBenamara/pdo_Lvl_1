<body>
    <h1>Ajouter un contact</h1>
    <form action="insertion.php" method="post"> 
        <div>
            <p>
                <label for="nom">Nom</label>
                <input  id="nom" type="text" name="firstname" >
            </p>
            <p>
                <label for="prenom">Prenom</label>  
                <input  id="prenom" type="text" name="lastname" >

            </p>
            <p>
                <label for="tel">téléphone</label>    
                <input  id="tel" type="text" name="phone" >

            </p>
            <p>
                <label for="mel">Adresse éléctronique</label>    
                <input  id="mel" type="email" name="mail" >

            </p>
            <p>
                <input type="submit" value="Enregistrer" >

            </p>
        </div>
    </form>

</body>