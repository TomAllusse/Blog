<?php

require_once '../BDD/connexionBDD.php';
require_once '../VerificationEmail.php';

$bdd = connexionBDD();

if (!empty($_POST['email']) && !empty($_POST['password'] && !empty($_POST['pass']))) {
    $email = htmlspecialchars(strip_tags($_POST["email"]));
    $password = htmlspecialchars(strip_tags($_POST["password"]));
    $pwd = htmlspecialchars(strip_tags($_POST['pass']));
    $role = "ROLE_USER";

    $hash = password_hash($password, PASSWORD_ARGON2I);
    
    $prep = $bdd->prepare("SELECT * FROM `users`");
    $prep->execute();
    $rsusers= $prep->fetchall();
    $erreur = 0;

    if($rsusers){
        foreach($rsusers as $rsuser){
            if($rsuser['E_mail'] == $email){
                $erreur = 1;
                echo "Cette utilisateur existe déjà !<br>";
            }
        }
    }
    if($erreur == 0){
        if(password_verify($pwd, $hash) == 1 && verifEmail($email) == 1){
            $prep = $bdd->prepare("INSERT INTO users (E_mail, Passwords, Roles) VALUES (:email, :passwords, :role)");
            $prep->bindValue(":email", $email);
            $prep->bindValue(":passwords", $hash);
            $prep->bindValue(":role", $role);
            $prep->execute();
            echo "Utilisateur ajoutée !<br>";
            header('Location: ../compte.php');
            exit();
        }
        else
        {
            if(password_verify($pwd, $hash) == 0){
                echo "Le mots de passe n'est pas le même !<br>";
            }
            if(verifEmail($email) == 0){
                echo "L'email n'est pas valide !<br>";
            }
        }
    }else{
        header('Location: formInscription.php');
        exit();
    }
    // Fermer la connexion à la base de données
    $bdd = null;
}
?>
