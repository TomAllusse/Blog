<?php

    if ($_FILES['image_Article']['size'] > 10000000) {
        throw new RuntimeException('Exceeded filesize limit.');
    }
    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($_FILES["image_Article"]["name"]);

    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    if (!move_uploaded_file(
        $_FILES['image_Article']['tmp_name'],
        $lien = sprintf('../uploads/%s.%s',
            sha1_file($_FILES['image_Article']['tmp_name']),
            $imageFileType
        )
    )) {
        throw new RuntimeException('Failed to move uploaded file.');
    }
    echo 'File is uploaded successfully.';

    require_once '../BDD/connexionBDD.php';

    session_start();
    $bdd = connexionBDD();

    $title = htmlspecialchars(strip_tags($_POST["title"]));
    $Contained = htmlspecialchars(strip_tags($_POST["Contained"]));

    $prep = $bdd->prepare("SELECT * FROM `post`");
    $prep->execute();
    $post= $prep->fetchall();

    $prep = $bdd->prepare("INSERT INTO users (Id_Post, Picture, Contained, Created_at) VALUES (:title, :images, :image_Article, now())");
    $prep->bindValue(":title", $title);
    $prep->bindValue(":Contained", $Contained);
    $prep->bindValue(":images", $lien);
    $prep->execute();
    echo "Utilisateur ajoutée !<br>";

    $prep = $bdd->prepare("SELECT `Id_Post` FROM `post` WHERE `Title`=:title");
    $prep->bindValue(":title", $title);
    $prep->execute();
    $id_post= $prep->fetchColumn();

    $prep = $bdd->prepare("UPDATE `users` SET `Id_Post` =:id_post WHERE `E_mail` = :email;");
    $prep->bindValue(":email", $_SESSION['user']['mail']);
    $prep->bindValue(":id_post", $id_post);
    $prep->execute();
    // Fermer la connexion à la base de données
    $bdd = null;

?>