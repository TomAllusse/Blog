<?php

    require_once '../BDD/connexionBDD.php';
    require_once '../POO/Post.php';

    $bdd = connexionBDD();
    session_start();

    $title = htmlspecialchars(strip_tags($_POST["title"]));
    $Contained = htmlspecialchars(strip_tags($_POST["Contained"]));
    $resume=substr($Contained,0,500);

    $post = new Post($_GET['id'],"","","","",0);
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
                $Image = sprintf('../uploads/Articles/%s.%s',
                sha1_file($_FILES['image_Article']['tmp_name']),
                $imageFileType
            )
        )) {
            throw new RuntimeException('Failed to move uploaded file.');
        }
        $lienImage='';
        for($i = 3; $i < strlen($Image); $i++){
            $lienImage = $lienImage.$Image[$i];
        }
        echo 'File is uploaded successfully.';

        $pictureLink = $post->LinkPicture();
        var_dump($pictureLink['Picture']);
        if (!empty($lienImage)) {
            if('../'.$pictureLink['Picture'] != '../images/account.png'){
                unlink('../'.$pictureLink['Picture']);
            }
            $prep = $bdd->prepare("UPDATE `post` SET `Picture` = :image WHERE `Id_Post` = :id;");
            $prep->bindValue(":id", $_GET['id']);
            $prep->bindValue(":image", $lienImage);
            $prep->execute();
        }
    }
    /*$lienImage =$post->InsertionImage();*/
    $post->UpdatePost($_GET['id'], $title, $Contained, $resume, $lienImage);

    $Id_User = $post->DisplayUserID($_GET['id']);

    $bdd = null;
    header("Location: DisplayMyPost.php?id=".$Id_User['Id_User']."");
    exit();
?>
