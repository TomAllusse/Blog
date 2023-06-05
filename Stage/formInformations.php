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
        <form method="post" action="Informations/Informations.php" >
            <h2>
                Remplissez vos informations
            </h2>
            <fieldset>
                <h3>Vos Informations personnelles (Information déjà remplie :  *)</h3>
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
                <input type="date" id="date" name="date" required="required"> <br>
                <label for="email">
                    Email :
                </label>
                <input type="email" id="email" name="email" autocomplete="on" placeholder="<?php echo $_SESSION['user']['mail'].' *'; ?>"> <br>
                <label for="numero">
                    Numéro de téléphone :
                </label>
                <input type="text" id="numero" name="numero" placeholder="Ex : +33 6 95 55 45 56"> <br>
            </fieldset>
            <fieldset>
                <label for="image_User">
                    Charger une image (Max 5Mo) :
                </label>
                <!-- <input type="hidden" name="MAX_FILE_SIZE" value="5000000" /> -->
                <input type="file" name="image_User" id="image_User">
            </fieldset>
            <input id="buttonform" type="submit" value="Inscription" >
        </form>
    </main>
    <?php
        require_once('layouts/footer.php');
    ?>
</body>
<script src="js/javascript.js"></script>
</html>