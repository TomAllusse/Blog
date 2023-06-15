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
        <h1>Mon Blog</h1>
        <?php
            require('POO/Post.php');

            $post_test = new Post(0,'','','','',0);

            $post = $post_test->DisplayPostGlobal();

            foreach($post as $resultat){
                echo "
                    <div class=\"article_principal\">
                        <img src=".$resultat['Picture']." alt=\"image de l'article\">
                        <article class=\"articlePrincipal\">
                            <h2>".$resultat['Title']."</h2>
                            <h3>".$resultat['Name_Categories']."</h3>
                            <p>".$resultat['Contained']."</p>";
                echo'       <a class="bouton_index" href="New-post.php?id='.$resultat['Id_Post'].'"><button>Lire la suite ...</button></a>
                        </article>
                    </div>
                    ';
            }
        ?>
        
    </main>
    <?php
        require_once('layouts/footer.php');
    ?>
</body>
<script src="js/javascript.js"></script>
</html>