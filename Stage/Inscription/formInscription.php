<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..\css\menu.css">
    <link rel="stylesheet" href="..\css\styles.css">
    <title>Formulaire inscription</title>
</head>
<body>
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
            <input type="email" id="email" name="email" autocomplete="on" placeholder="Ex : paulgermain@gmail.com" required="required" size="30"> <br>
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
            <input id="buttonform" type="submit" value="Envoyer" >
        </fieldset>
    </form>
    <?php
        require_once('..\layouts\footer.php');
    ?>
</body>
</html>