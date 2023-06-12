<?php 
    require_once 'BDD/connexionBDD.php';

    $bdd = connexionBDD();    

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
    <!--Boostrap CSS
    <link href="bootstrap-5.2.2-dist/css/bootstrap.css" rel="stylesheet"> -->
    <title>Accueil</title>
</head>
<body>
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
        <article class="texte_article">

        <?php
            $prep = $bdd->prepare("SELECT * FROM `post` WHERE Id_Post=:id");
            $prep->bindValue(":id",$_GET['id']);
            $prep->execute();
            $post= $prep->fetch();
            echo '<h1>'.$post['Title'].'</h1>';
            echo '<h3>'.'</h3>';
            echo '
                <img src="'.$post['Picture'].'" alt="image de l`article">
                <p>'.$post['Contained'].'</p>
                ';
        ?>
            <h1>Titre de l'article</h1>
            <h3>Catégorie</h3>
            <img src="images/test.jpg" alt="image de l'article">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque quis finibus sem. Sed auctor ipsum nisi, feugiat elementum magna accumsan id. Proin in sollicitudin nisi. Suspendisse urna sem, blandit ac molestie eu, iaculis ut urna. Aliquam erat volutpat. Etiam cursus nisl arcu. Sed vel tempus elit, nec finibus quam. Praesent non diam mollis, semper nisl non, convallis lorem. Etiam semper auctor mi, sed pharetra ligula tincidunt sit amet. Phasellus nunc odio, mollis non massa at, mattis volutpat quam. Suspendisse vitae sapien efficitur purus commodo luctus varius quis nunc. In ultrices tellus ex, pulvinar euismod eros cursus a. Donec posuere neque eu iaculis mattis. Nam at sapien faucibus, dictum nibh tristique, eleifend eros. Fusce eget malesuada tortor. Nunc est enim, lobortis vitae neque et, luctus mattis eros.</p>
            <br>
        </article>
    </main>
    <?php
        require_once('layouts/footer.php');
    ?>
</body>
<script src="js/javascript.js"></script>
</html>