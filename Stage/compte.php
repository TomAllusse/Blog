<?php

    session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/compte.css">
    <!--Boostrap CSS-->
    <link rel="stylesheet" href="bootstrap-5.2.2-dist/css/bootstrap-grid.css">
    <title>Accueil</title>
</head>
<body>
    <?php
        if($_SESSION['user']['role'] != "ROLE_ADMIN"){
            require_once('layouts/nav-bar.php');
        }else{
            require_once('layouts/nav-bar-admin.php');
        }
    ?>
    <main>
        <form method="post" action="Inscription/formInscription.php" >
            <fieldset>
                <h2>
                    Cliquez sur le bouton pour l'inscription
                </h2>
                <input id="buttonform" type="submit" value="Inscription" >
            </fieldset>
        </form>
        <form method="post" action="Connexion/formConnexion.php" >
            <fieldset>
                <h2>
                    Cliquez sur le bouton pour la connexion
                </h2>
                <input id="buttonform" type="submit" value="Connexion" >
            </fieldset>
        </form>
    </main>
    <?php
        require_once('layouts/footer.php');
    ?>
</body>
<script src="js/javascript.js"></script>
</html>