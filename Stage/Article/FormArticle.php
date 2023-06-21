<?php

    require_once '../BDD/connexionBDD.php';
    require_once '../POO/Categories.php';

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
    <!--Boostrap CSS
    <link href="../bootstrap-5.2.2-dist/css/bootstrap.css" rel="stylesheet">
    --><title>Formulaire inscription</title>
</head>
<body id="corps">
    <form method="post" action="InsertArticle.php" enctype="multipart/form-data">
        <fieldset>
            <h2>
                Informations Article
            </h2>
            <label for="title">
                Titre article :
            </label>
            <input type="text" id="title" name="title" autocomplete="on" required="required"> <br>
            <label for="categories">
                Séléctionner le type de catégories correspondant à l'article :
            </label>
            <select name="ChoixCategories" id="ChoixCategories">
                <?php
                    $categories = new Categories(0,"");
                    $AffichageCategories = $categories->DisplayCategories();
                    foreach($AffichageCategories as $resultatCategories){
                        $IdCategories = $resultatCategories['Id_Categories'];
                        $NameCategories = $resultatCategories['Name_Categories'];

                        echo "<option value=\"$IdCategories\">$NameCategories</option>";
                    }
                ?>
            </select>
            <label for="image_Article">
                Charger une image (Max 10Mo) :
            </label>
            <input type="file" name="image_Article" id="image_Article" required="required" accept=".jpg, .jpeg, .png">
            <label for="Contained">
                Contenue de l'article (Minimum 200 caractères):
            </label>
            <textarea name="Contained" id="Contained" required="required" minlength="200"></textarea> <br>   
            <input id="buttonform" type="submit" value="Valider" >
        </fieldset>
    </form>
    <?php
        require_once('../layouts/footer.php');
    ?>
</body>
</html>