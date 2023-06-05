<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..\css\menu.css">
    <link rel="stylesheet" href="..\css\styles.css">
    <link rel="stylesheet" href="..\css\compte.css">
    <title>Formulaire connexion</title>
</head>
<body>
    <form method="post" action="connexion.php" >
        <fieldset>
            <h2>
                Connexion
            </h2>
            <label for="email">
                Email :
            </label>
            <input type="email" id="amail" name="identifiant" autocomplete="on" required="required"> <br>
            <label for="pass">
                Mots de passe :
            </label>
            <input type="password" id="password" name="password" required="required" minlength="8" size="15"> <br>
            <input id="buttonform" type="submit" value="Envoyer" >
        </fieldset>
    </form>
    <?php
        require_once('..\layouts\footer.php');
    ?>
</body>
<script src="js/javascript.js"></script>
</html>