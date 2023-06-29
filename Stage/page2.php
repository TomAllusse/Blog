<?php

    session_start();

    if($_GET['deconnexion'] == true){
        session_destroy();
    }

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
    <link rel="stylesheet" href="css/footer.css">
    <!--Boostrap CSS-->
    <link href="bootstrap-5.2.2-dist/css/bootstrap.css" rel="stylesheet">
    <style>
        footer{
            position: fixed;
            right: 0;
            left: 0;
        }
        #deconnexion{
            font-weight: bolder;
            background-color: #F6F1F1;
            color: #181717;
            padding: 25px;
            border-radius: 40px;
        }
        #deconnexion:hover{
            color: #F6F1F1;
            background-color: #181717;
        }
        #deconnexion a{
            text-decoration: none;
        }
    </style>
    <title>Accueil</title>
</head>
<body>
    <?php
        if(!empty($_SESSION['user']['role'])){
            $role = $_SESSION['user']['role'];
        }
        require_once('layouts/nav-bar.php');
    ?>
    <main>
        <?php
            var_dump($_SESSION);
            echo"<br>";
            var_dump($_SESSION['user']);
            echo"<br>";
            var_dump(session_id());
        ?>
    </main>
    <?php
        require_once('layouts/footer.php');
        echo '<a href="page2.php?deconnexion=true"><button id="deconnexion" type="submit">Deconnexion</button></a>'
    ?>
</body>
<script src="js/javascript.js"></script>
</html>