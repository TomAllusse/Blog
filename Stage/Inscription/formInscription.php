<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/compte.css">
    <link rel="stylesheet" href="../css/submit.css">
    <link rel="stylesheet" href="../css/footer.css">
    <!--Boostrap CSS-->
    <link href="bootstrap-5.2.2-dist/css/bootstrap.css" rel="stylesheet">
    <title>Formulaire inscription</title>
</head>
<body id="corps">
    <form method="post" action="insertInscription.php" >
        <fieldset>
            <h2>
                Inscription
            </h2>
            <h3>Vos Informations personnelles</h3>
            <!--
            <label for="prenom">
                Prénom :
            </label>
            <input type="text" id="prenom" name="prenom" autocomplete="on" placeholder="Ex : Paul" required="required"> <br>
            <label for="nom">
                Nom :
            </label>
            <input type="text" id="nom" name="nom" autocomplete="on" placeholder="Ex : Germain" required="required"> <br> 
            <label for="date">
                Date de naissance:
            </label>
            <input type="date" id="date" name="date" required="required"> <br>-->
            <label for="email">
                Email :
            </label>
            <input type="email" id="email" name="email" autocomplete="on" placeholder="Ex : paulgermain@gmail.com" required="required"> <br>
            <!--<label for="numero">
                Numéro de téléphone :
            </label>
            <input type="text" id="numero" name="numero" placeholder="Ex : +33 6 95 55 45 56"> <br>-->
            <label for="password">
                Mots de passe (8 caractères minimum):
            </label>
            <input type="password" id="password" name="password" required="required" minlength="8" size="15"> <br>
            <label for="password">
                Répéter le mots de passe (8 caractères minimum):
            </label>
            <input type="password" id="pass" name="pass" required="required" minlength="8" size="15"> <br>
            <button id="button" type="submit">
                <svg width="196px" height="70px" viewPort="0 0 196 70" version="1.1" xmlns="http://www.w3.org/2000/svg">
                    <text class="check" x="96" y="40" font-family="Montserrat" font-size="22" fill-opacity="1" text-anchor="middle" fill=#181717>
                        VALIDER
                    </text>
                    <text class="checkNode" x="96" y="40" font-family="Montserrat" font-size="22" fill-opacity="1" text-anchor="middle" fill=#181717>
                        ✔
                    </text> 
                </svg>
            </button>
        </fieldset>
    </form>
    <?php
        require_once('../layouts/footer.php');
    ?>
</body>
</html>