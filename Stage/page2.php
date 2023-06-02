<?php

    session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/page2.css">
    <title>Accueil</title>
</head>
<body>
    <?php
        require_once('layouts/nav-bar.php');
    ?>
    <main>
        <?php
            foreach($_SESSION['user'] as $nb => $infos){
                $nb++;
                foreach($infos as $clef => $valeur){
                    echo 'Mail : '.$clef. ' - Nom : ' .$valeur. ' <br>';
                }
            }
            
        ?>
    </main>
    <?php
        require_once('layouts/footer.php');
    ?>
</body>
<script src="js/javascript.js"></script>
</html>