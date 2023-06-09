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
    <!--Boostrap CSS-->
    <link href="bootstrap-5.2.2-dist/css/bootstrap.css" rel="stylesheet">
    <title>Formulaire connexion</title>
</head>
<body  id="corps">
    <form method="post" action="connexion.php" >
        <fieldset>
            <h2>
                Connexion
            </h2>
            <label for="email">
                Email :
            </label>
            <input type="email" id="email" name="identifiant" autocomplete="on" required="required"> <br>
            <label for="pass">
                Mots de passe :
            </label>
            <input type="password" id="password" name="password" required="required" minlength="8" size="15"> <br>
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
<script src="js/javascript.js"></script>
</html>