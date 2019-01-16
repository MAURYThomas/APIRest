<!DOCTYPE html>
<html>
    <head>
        <link type="text/css" rel="stylesheet" href="style.css">
        <title>Recherche clients</title>
    </head>

    <body>
        <h1>Bienvenue sur la fonction de recheche client</h1>
            <h3>Les données sont récuperer en JSON depuis l'API</h3>
        
        <!-- Fonction de tri -->
    <form action="recherche.php" method="post">
        <label>Quel client recherchez-vous ?</label>
        <input text="text" id="nom" name="nom" label="nom"/>
        <input type="submit" value="valider"/>
    </form>

    </body>

</html>