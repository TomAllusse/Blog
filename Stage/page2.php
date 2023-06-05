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
        if($_SESSION['user']['role'] != "ROLE_ADMIN"){
            require_once('layouts/nav-bar.php');
        }else{
            require_once('layouts/nav-bar-admin.php');
        }
    ?>
    <main>
        <?php
        /*
            echo $_SESSION['user']['mail'].'<br>';
            echo $_SESSION['user']['name'].'<br>';
            echo $_SESSION['user']['pwd'].'<br>';
            echo $_SESSION['user']['role'].'<br>';
        */
        ?>
    </main>
    <?php
        require_once('layouts/footer.php');
    ?>
</body>
<script src="js/javascript.js"></script>
</html>