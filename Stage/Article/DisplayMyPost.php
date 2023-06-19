<?php

    session_start();

    $role = $_SESSION['user']['role'];
    if ( $role == 'ROLE_ADMIN' || $role == 'ROLE_USER') {
    }else{
        header('Location: ../index.php');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/compte.css">
    <!--Boostrap CSS-->
    <link href="bootstrap-5.2.2-dist/css/bootstrap.css" rel="stylesheet">
    <title>Affichage des articles</title>
</head>
<body id="corps">
    <?php
        require_once '../BDD/connexionBDD.php';
        require('../POO/Post.php');

        $post = new Post(0,'','','','','',$_GET['id']);
    
        $post2 = $post->DisplayPostUser($_GET['id']);

        if(!isset($post2)){
            foreach($post2 as $resultat){
                $lien = '../'.$resultat['Picture'];
                echo "
                    <div class=\"article_principal\">
                        <img src=".$lien." alt=\"image de l'article\">
                        <article class=\"articlePrincipal\">
                            <h2>".$resultat['Title']."</h2>
                            <h3>".$resultat['Name_Categories']."</h3>
                            <p class=\"ContainedPost\">".$resultat['Resume']."</p>";
                echo'       <a class="bouton_index" href="UpdatePost.php?id='.$resultat['Id_Post'].'"><button>Modifier mon article</button></a>
                        </article>
                    </div>
                    ';
            }
        }else{
            echo "<h1>Vous n'avez aucun article !</h1>";
        }
    ?>
    <?php
        require_once('../layouts/footer.php');
    ?>
</body>
</html>