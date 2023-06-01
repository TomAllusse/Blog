<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/compte.css">
    <title>Accueil</title>
</head>
<body>
    <?php
        require_once('layouts/nav-bar.php');
    ?>
    <main>
        <form method="post" action="Inscription/formInscription.php" >
            <fieldset>
                <h2>
                    Cliquez sur le bouton pour l'inscription
                </h2>
                <input id="buttonform" type="submit" value="Envoyer" >
            </fieldset>
        </form>
        <form method="post" action="Connexion/connexion.php" >
            <fieldset>
                <h2>
                    Connexion
                </h2>
                <label for="login">
                    Identifiant ou Email :
                </label>
                <input type="text" id="login" name="identifiant" autocomplete="on" required="required"> <br>
                <label for="pass">
                    Mots de passe :
                </label>
                <input type="password" id="pass" name="pass" autocomplete="on" required="required"> <br>
                <input id="buttonform" type="submit" value="Envoyer" >
            </fieldset>
        </form>
    </main>
    <?php
        require_once('layouts/footer.php');
    ?>
</body>
<script src="js/javascript.js"></script>
</html>