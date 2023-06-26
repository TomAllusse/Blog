<?php
    require_once 'BDD/connexionBDD.php';
    require_once 'POO/User.php';
    $user = new User($_GET['idUser'], "", "","", "","", "","", "");
    $user->DeleteImageUser($_GET['idUser']);
    $user->DeleteUser($_GET['idUser']);

    header('Location: index.php?delete=true');
    exit();
?>