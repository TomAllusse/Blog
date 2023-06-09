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
    <link rel="stylesheet" href="css/compte.css">
    <!--Boostrap CSS-->
    <link href="bootstrap-5.2.2-dist/css/bootstrap.css" rel="stylesheet">
    <!--Bouton-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <?php
        if(!isset($_SESSION['user'])){
            echo '<style>
                    @media only screen  and (max-width:425px){
                        footer{
                            position: fixed;
                            right: 0;
                            left: 0;
                        }
                    }
                </style>';
        }
    ?>
    <title>Accueil</title>
</head>
<body id="corps">
    <?php
        $role = "ROLE_USER";
        if(!empty($_SESSION['user']['role'])){
            $role = $_SESSION['user']['role'];
        }
        if($role == "ROLE_ADMIN"){
            require_once('layouts/nav-bar.php');
        }else{
            require_once('layouts/nav-bar-admin.php');
        }
    ?>
    <main>
        <?php
            require_once('utilisateur.php');
        ?>
    </main>
    <?php
        require_once('layouts/footer.php');
    ?>
</body>
<script src="js/javascript.js"></script>
</html>
