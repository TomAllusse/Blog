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

    $title = htmlspecialchars(strip_tags($_POST["title"]));
    $Contained = htmlspecialchars(strip_tags($_POST["Contained"]));
    $ChoixCategories = htmlspecialchars(strip_tags($_POST["ChoixCategories"]));

    $prep = $bdd->prepare("SELECT Id_User FROM `users` WHERE `E_mail`=:email");
    $prep->bindValue(":email", $_SESSION['user']['mail']);
    $prep->execute();
    $id_user= $prep->fetchColumn();

    $prep = $bdd->prepare("SELECT * FROM `post` WHERE `Title`=:title");
    $prep->bindValue(":title", $title);
    $prep->execute();
    $post= $prep->fetch();

    $resume=substr($Contained,0,500);

    if(empty($post)){
        $prep = $bdd->prepare("INSERT INTO post (Title, Picture, Contained, Created_at, Id_User, Resume) VALUES (:title, :images, :Contained, now(),:id_user,:resume)");
        $prep->bindValue(":id_user", $id_user);
        $prep->bindValue(":title", $title);
        $prep->bindValue(":Contained", $Contained);
        $prep->bindValue(":images", $lien2);
        $prep->bindValue(":resume", $resume);
        $prep->execute();
        echo "Post ajoutée !<br>";
        
        require_once '../POO/Post.php';

        $post = new Post(0,'','','','','',0);

        $id_post = $post->VerifTitle($title);
        echo "Id post trouver !<br>";

        var_dump($id_post['Id_Post']);
        var_dump($ChoixCategories);

        $prep = $bdd->prepare("INSERT INTO to_have (Id_Categories, Id_Post) VALUES (:id_categories, :id_post)");
        $prep->bindValue(":id_categories", $ChoixCategories);
        $prep->bindValue(":id_post", $id_post['Id_Post']);
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