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
        <h1 id="TitreIndex">Mon Blog</h1>
        <?php
            require_once 'BDD/connexionBDD.php';
            require('POO/Post.php');

            $post_test = new Post(0,'','','','','',0);

            $MaxPost = $post_test->MaxPostID();
            $post = $post_test->DisplayPostGlobal();

            if($MaxPost != 0){
                foreach($post as $resultat){
                    echo "
                        <div class=\"article_principal\">
                            <div class=\"img\">
                                <img class=\"image\" src=".$resultat['Picture']." alt=\"image de l'article\">
                            </div>    
                            <article class=\"articlePrincipal\">
                                <h2>".$resultat['Title']."</h2>
                                <h3>".$resultat['Name_Categories']."</h3>
                                <p id=\"marge\">".$resultat['Resume']."</p>";
                    echo'       <a class="bouton_index" href="New-post.php?id='.$resultat['Id_Post'].'"><button>Lire la suite ...</button></a>
                            </article>
                        </div>
                        ';
                }
            }else{
                echo "<h1>Aucun article existe !</h1>";
            }
        ?>
    </main>
    <?php
        require_once('layouts/footer.php');
    ?>
</body>
<script src="js/javascript.js"></script>
</html>