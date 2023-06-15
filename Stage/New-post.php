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
    <!--Boostrap CSS-->
    <link href="bootstrap-5.2.2-dist/css/bootstrap.css" rel="stylesheet">
    <title>Accueil</title>
</head>
<body>
    <?php
        $role = "ROLE_USER";
        if(!empty($_SESSION['user']['role'])){
            $role = $_SESSION['user']['role'];
        }
        if($role != "ROLE_ADMIN"){
            require_once('layouts/nav-bar.php');
        }else{
            require_once('layouts/nav-bar-admin.php');
        }
    ?>
    <main>
        <article class="texte_article">
            <?php
                require_once 'POO/Post.php';
                $affichagPost = new Post(0,"","","","",0);

                $post = $affichagPost->AffichagePost(1);

                echo '<h1>'.$post['Title'].'</h1>';
                echo '<h3>'.$post['Name_Categories'].'</h3>';
                echo '
                    <img src="'.$post['Picture'].'" alt="image de l`article">
                    <p>'.$post['Contained'].'</p>
                    ';
            ?>
        </article>
    </main>
    <?php
        require_once('layouts/footer.php');
    ?>
</body>
<script src="js/javascript.js"></script>
</html>