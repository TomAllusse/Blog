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
        <div class="article_principal">
            <img src="images/test.jpg" alt="image de l'article">
            <article class="articlePrincipal">
                <h2>Titre de l'article</h2>
                <h3>Catégorie</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque quis finibus sem. Sed auctor ipsum nisi, feugiat elementum magna accumsan id. Proin in sollicitudin nisi. Suspendisse urna sem, blandit ac molestie eu, iaculis ut urna. Aliquam erat volutpat.</p>
                <a class="bouton_index" href="article.php"><button>Lire la suite ...</button></a>
            </article>
        </div>
        <div class="article_principal">
            <img src="images/test.jpg" alt="image de l'article">
            <article class="articlePrincipal">
                <h2>Titre de l'article</h2>
                <h3>Catégorie</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque quis finibus sem. Sed auctor ipsum nisi, feugiat elementum magna accumsan id. Proin in sollicitudin nisi. Suspendisse urna sem, blandit ac molestie eu, iaculis ut urna. Aliquam erat volutpat.</p>
                <a class="bouton_index" href="article.php"><button>Lire la suite ...</button></a>
            </article>
        </div>
        <div class="article_principal">
            <img src="images/test.jpg" alt="image de l'article">
            <article class="articlePrincipal">
                <h2>Titre de l'article</h2>
                <h3>Catégorie</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque quis finibus sem. Sed auctor ipsum nisi, feugiat elementum magna accumsan id. Proin in sollicitudin nisi. Suspendisse urna sem, blandit ac molestie eu, iaculis ut urna. Aliquam erat volutpat.</p>
                <a class="bouton_index" href="article.php"><button>Lire la suite ...</button></a>
            </article>
        </div>
        <div class="article_principal">
            <img src="images/test.jpg" alt="image de l'article">
            <article class="articlePrincipal">
                <h2>Titre de l'article</h2>
                <h3>Catégorie</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque quis finibus sem. Sed auctor ipsum nisi, feugiat elementum magna accumsan id. Proin in sollicitudin nisi. Suspendisse urna sem, blandit ac molestie eu, iaculis ut urna. Aliquam erat volutpat.</p>
                <a class="bouton_index" href="article.php"><button>Lire la suite ...</button></a>
            </article>
        </div>
        <div class="article_principal">
            <img src="images/test.jpg" alt="image de l'article">
            <article class="articlePrincipal">
                <h2>Titre de l'article</h2>
                <h3>Catégorie</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque quis finibus sem. Sed auctor ipsum nisi, feugiat elementum magna accumsan id. Proin in sollicitudin nisi. Suspendisse urna sem, blandit ac molestie eu, iaculis ut urna. Aliquam erat volutpat.</p>
                <a class="bouton_index" href="article.php"><button>Lire la suite ...</button></a>
            </article>
        </div>
        <div class="article_principal">
            <img src="images/test.jpg" alt="image de l'article">
            <article class="articlePrincipal">
                <h2>Titre de l'article</h2>
                <h3>Catégorie</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque quis finibus sem. Sed auctor ipsum nisi, feugiat elementum magna accumsan id. Proin in sollicitudin nisi. Suspendisse urna sem, blandit ac molestie eu, iaculis ut urna. Aliquam erat volutpat.</p>
                <a class="bouton_index" href="article.php"><button>Lire la suite ...</button></a>
            </article>
        </div>
    </main>
    <?php
        require_once('layouts/footer.php');
    ?>
</body>
<script src="js/javascript.js"></script>
</html>