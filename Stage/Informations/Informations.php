<?php
if ($_FILES['image_User']['size'] > 5000000) {
        throw new RuntimeException('Exceeded filesize limit.');
    }
    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($_FILES["image_User"]["name"]);

    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    if (!move_uploaded_file(
        $_FILES['image_User']['tmp_name'],
        $lien = sprintf('../uploads/%s.%s',
            sha1_file($_FILES['image_User']['tmp_name']),
            $imageFileType
        )
    )) {
        throw new RuntimeException('Failed to move uploaded file.');
    }
    echo 'File is uploaded successfully.';

    require_once '../BDD/connexionBDD.php';
    require_once '../VerificationEmail.php';

    $bdd = connexionBDD();
    session_start();

    $prenom = htmlspecialchars(strip_tags($_POST["prenom"]));
    $nom = htmlspecialchars(strip_tags($_POST["nom"]));
    $date = htmlspecialchars(strip_tags($_POST['date']));
    $numero = htmlspecialchars(strip_tags($_POST['numero']));

    $prep = $bdd->prepare("SELECT * FROM `users` WHERE `E_mail` = :email;");
    $prep->bindValue(":email", $_SESSION['user']['mail']);
    $prep->execute();
    $user= $prep->fetch();

    if (!empty($_POST['prenom'])){
        $prep = $bdd->prepare("UPDATE `users` SET `FirstName` = :prenom WHERE `E_mail` = :email;");
        $prep->bindValue(":email", $_SESSION['user']['mail']);
        $prep->bindValue(":prenom", $prenom);
        $prep->execute();
    }
    if (!empty($_POST['nom'])){
        $prep = $bdd->prepare("UPDATE `users` SET `Name_User` = :nom WHERE `E_mail` = :email;");
        $prep->bindValue(":email", $_SESSION['user']['mail']);
        $prep->bindValue(":nom", $nom);
        $prep->execute();
    }
    if (!empty($_POST['date'])){
        $prep = $bdd->prepare("UPDATE `users` SET `Date_Of_Birth` = :date WHERE `E_mail` = :email;");
        $prep->bindValue(":email", $_SESSION['user']['mail']);
        $prep->bindValue(":date", $date);
        $prep->execute();
    }
    if (!empty($_POST['numero'])) {
        $prep = $bdd->prepare("UPDATE `users` SET  `Phone` = :numero WHERE `E_mail` = :email;");
        $prep->bindValue(":email", $_SESSION['user']['mail']);
        $prep->bindValue(":numero", $numero);
        $prep->execute();
    }
    if (!empty($lien)) {
        if('../'.$user['Picture_User'] != '../images/account.png'){
            unlink($user['Picture_User']);
        }
        $prep = $bdd->prepare("UPDATE `users` SET `Picture_User` = :image WHERE `E_mail` = :email;");
        $prep->bindValue(":email", $_SESSION['user']['mail']);
        $prep->bindValue(":image", $lien);
        $prep->execute();
    }
    if(!empty($_POST['email'])){
        $prep = $bdd->prepare("UPDATE `users` SET `E_mail` = :email WHERE `E_mail` = :emailOLD;");
        $prep->bindValue(":email", $_POST['email']);
        $prep->bindValue(":emailOLD", $_SESSION['user']['mail']);
        $prep->execute();
    }

    // Fermer la connexion à la base de données
    $bdd = null;

    header('Location:../compte.php');
    exit();
?>
