<?php

    if ($_FILES['image_Article']['size'] > 10000000) {
        throw new RuntimeException('Exceeded filesize limit.');
    }
    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($_FILES["image_Article"]["name"]);

    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    if (!move_uploaded_file(
        $_FILES['image_Article']['tmp_name'],
        $lien = sprintf('../uploads/Articles/%s.%s',
            sha1_file($_FILES['image_Article']['tmp_name']),
            $imageFileType
        )
    )) {
        throw new RuntimeException('Failed to move uploaded file.');
    }
    $lien2="";
    for($i = 3; $i < strlen($lien); $i++){
        $lien2 = $lien2.$lien[$i];
    }
    echo 'File is uploaded successfully.<br>';

    require_once '../BDD/connexionBDD.php';

    session_start();
    $bdd = connexionBDD();

    $title = strip_tags($_POST["title"]);
    $Contained = strip_tags($_POST["Contained"]);
    $ChoixCategories = strip_tags($_POST["ChoixCategories"]);

    $prep = $bdd->prepare("SELECT Id_User FROM `users` WHERE `E_mail`=:email");
    $prep->bindValue(":email", $_SESSION['user']['mail']);
    $prep->execute();
    $id_user= $prep->fetchColumn();

    require_once '../POO/Post.php';
    
    $post = new Post(0,'','','','','',0);
    $postVerif= $post->VerifTitle($title);

    $resume=substr($Contained,0,500);

    if(empty($postVerif)){
        
        $post->CreationPost($id_user, $title, $Contained, $resume, $lien2);
        echo "Post ajoutée !<br>";

        $id_post = $post->MaxPostID();
        echo "Id post trouver !<br>";

        var_dump($id_post);
        var_dump($ChoixCategories);

        $prep = $bdd->prepare("INSERT INTO to_have (Id_Categories, Id_Post) VALUES (:id_categories, :id_post)");
        $prep->bindValue(":id_categories", $ChoixCategories);
        $prep->bindValue(":id_post", $id_post);
        $prep->execute();
        echo "Post et Categories ajoutée !<br>";
    }else{
        header('Location:FormArticle.php');
        exit();
    }
    // Fermer la connexion à la base de données
    $bdd = null;
    header('Location: ../compte.php');
    exit();
?>