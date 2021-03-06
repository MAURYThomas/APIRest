<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/grids-responsive-min.css">
        <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css" integrity="sha384-nn4HPE8lTHyVtfCBi5yW9d20FjT8BJwUXyWZT9InLYax14RDjBj46LmSztkmNP9w" crossorigin="anonymous">
        <link type="text/css" rel="stylesheet" href="style.css">
        <title>Recherche clients</title>
    </head>

    <body>
        <h1 class="titre-principal"><u>Bienvenue sur la fonction de recheche client</u></h1>
            <h3>Les données sont récuperer en JSON depuis l'API</h3>

        <!-- filtrage -->
        <form class="pure-form pure-form-stacked" action="..\..\exemple\api\product\search.php" method="GET">
                <fieldset>            
                    <div class="pure-g">
                        <div class="pure-u-1 pure-u-md-1-3">
                            <label for="id">Ref contact (Id)</label>
                            <input id="id" class="pure-u-23-24" type="text" name="id">
                        </div>
            
                        <div class="pure-u-1 pure-u-md-1-3">
                            <label for="nom">Nom</label>
                            <input id="nom" class="pure-u-23-24" type="text" name="nom">
                        </div>

                        <div class="pure-u-1 pure-u-md-1-3">
                            <label for="prenom">Prénom</label>
                            <input id="prenom" class="pure-u-23-24" type="text" name="prenom">
                        </div>
            
                        <div class="pure-u-1 pure-u-md-1-3">
                            <label for="adresse">Adresse</label>
                            <input id="adresse" class="pure-u-23-24" type="text" name="adresse">
                        </div>
            
                        <div class="pure-u-1 pure-u-md-1-3">
                            <label for="ville">Ville</label>
                            <input id="ville" class="pure-u-23-24" type="text" name="ville">
                        </div>
            
                        <div class="pure-u-1 pure-u-md-1-3">
                            <label for="pays">Pays</label>
                            <input id="pays" class="pure-input-1-2" name="pays" name="pays">
                        </div>

                        <div class="pure-u-1 pure-u-md-1-3">
                                <label for="code postal">Code Postal</label>
                                <input id="code postal" class="pure-input-1-2" name="cp">
                        </div>
                    </div>
            
                    <button type="submit" class="pure-button pure-button-primary">Submit</button>
                </fieldset>
            </form>
    </body>

</html>
