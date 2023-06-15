<?php

    require_once '../BDD/connexionBDD.php';
    require_once '../VerificationEmail.php';

    $bdd = connexionBDD();
    session_start();

    $title = htmlspecialchars(strip_tags($_POST["title"]));
    $Contained = htmlspecialchars(strip_tags($_POST["Contained"]));

    $prep = $bdd->prepare("SELECT * FROM `post` WHERE `Title`=:title");
    $prep->bindValue(":title", $title);
    $prep->execute();
    $post= $prep->fetch();

    if (!empty($_POST['title'])){
        $prep = $bdd->prepare("UPDATE `post` SET `Title` = :title WHERE `Id_Post` = :id;");
        $prep->bindValue(":id", $_GET['id']);
        $prep->bindValue(":title", $title);
        $prep->execute();
    }
    if (!empty($_POST['Contained'])) {
        $prep = $bdd->prepare("UPDATE `post` SET  `Contained` = :Contained WHERE `Id_Post` = :id;");
        $prep->bindValue(":id", $_GET['id']);
        $prep->bindValue(":Contained", $Contained);
        $prep->execute();
    }
    if(!empty($_FILES['image_Article']['size'])){
        if ($_FILES['image_Article']['size'] > 10000000) {
            header('Location:../user.php?modif=true');
            exit();
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
        $lien2='';
        for($i = 3; $i < strlen($lien); $i++){
            $lien2 = $lien2.$lien[$i];
        }
        echo 'File is uploaded successfully.';
        if (!empty($lien2)) {
            if('../'.$user['Picture'] != '../images/account.png'){
                unlink('../'.$user['Picture']);
            }
            $prep = $bdd->prepare("UPDATE `post` SET `Picture` = :image WHERE `Id_Post` = :id;");
            $prep->bindValue(":id", $_GET['id']);
            $prep->bindValue(":image", $lien2);
            $prep->execute();
        }
    }

    // Fermer la connexion à la base de données
    $bdd = null;

    $post = new Post($_GET['id'],'','','','',0);

    $Id_User= $post->DisplayPostUser($_GET['id']);

    header('Location: DisplayMyPost.php?='.$Id_User);
    exit();
?>
