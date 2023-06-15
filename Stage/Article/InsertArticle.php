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
    echo 'File is uploaded successfully.<br>';

    require_once '../BDD/connexionBDD.php';

    session_start();
    $bdd = connexionBDD();

    $title = htmlspecialchars(strip_tags($_POST["title"]));
    $Contained = htmlspecialchars(strip_tags($_POST["Contained"]));

    $prep = $bdd->prepare("SELECT Id_User FROM `users` WHERE `E_mail`=:email");
    $prep->bindValue(":email", $_SESSION['user']['mail']);
    $prep->execute();
    $id_user= $prep->fetchColumn();

    $prep = $bdd->prepare("SELECT * FROM `post` WHERE `Title`=:title");
    $prep->bindValue(":title", $title);
    $prep->execute();
    $post= $prep->fetch();
    if(empty($post)){
        $prep = $bdd->prepare("INSERT INTO post (Title, Picture, Contained, Created_at, Id_User) VALUES (:title, :images, :Contained, now(),:id_user)");
        $prep->bindValue(":id_user", $id_user);
        $prep->bindValue(":title", $title);
        $prep->bindValue(":Contained", $Contained);
        $prep->bindValue(":images", $lien);
        $prep->execute();
        echo "Post ajoutée !<br>";
    }else{
        header('Location:FormArticle.php');
        exit();
    }
    // Fermer la connexion à la base de données
    $bdd = null;
    header('Location:FormArticle.php');
    exit();
?>