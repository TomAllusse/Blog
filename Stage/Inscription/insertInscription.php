<?php

require_once '..\BDD\connexionBDD.php';
require_once '..\VerificationEmail.php';

$bdd = connexionBDD();
//if (empty($_POST['nom']) && empty($_POST['prenom']) && empty($_POST['date']) && empty($_POST['email']) && empty($_POST['numero']) && empty($_POST['password'] && empty($_POST['pass']))) {
if (!empty($_POST['email']) && !empty($_POST['password'] && !empty($_POST['pass']))) {
    // Récupération des champs saisis
    //$name = htmlspecialchars(strip_tags($_POST['nom']));
    $name = '0';
    //$firstname= htmlspecialchars(strip_tags($_POST["prenom"]));
    $firstname = '0';
    //$date = htmlspecialchars(strip_tags($_POST["date"]));
    $date = '0000-00-00';
    $email = htmlspecialchars(strip_tags($_POST["email"]));
    //$numero = htmlspecialchars(strip_tags($_POST["numero"]));
    $numero = '0';
    $password = htmlspecialchars(strip_tags($_POST["password"]));
    $pwd = htmlspecialchars(strip_tags($_POST['pass']));
    $role = "ROLE_USER";

    $hash = password_hash($password, PASSWORD_ARGON2I);
    
    $prep = $bdd->prepare("SELECT * FROM `users`");
    $prep->execute();
    $rsusers= $prep->fetchall();
    $nbr=$prep->rowCount();

    if($rsusers){
        foreach($rsusers as $rsuser){
            if($rsuser['E_mail'] != $email){
                if(password_verify($pwd, $hash) == 1 && verifEmail($email) == 1){
                    $prep = $bdd->prepare("INSERT INTO users (FirstName, Name_User, Date_Of_Birth, E_mail, Phone, Passwords, Roles) VALUES (:firstname, :name, :dateN, :email, :numero, :passwords, :role)");
                    $prep->bindValue(":firstname", $firstname);
                    $prep->bindValue(":name", $name);
                    $prep->bindValue(":dateN", $date);
                    $prep->bindValue(":email", $email);
                    $prep->bindValue(":numero", $numero);
                    $prep->bindValue(":passwords", $hash);
                    $prep->bindValue(":role", $role);
                    $prep->execute();
                    echo "Utilisateur ajoutée !<br>";
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
            }
            else
            {
                echo "Cette utilisateur existe déjà !<br>";
            }
        }
    }
    else
    {
        if(password_verify($pwd, $hash) == 1 && verifEmail($email) == 1){
            $prep = $bdd->prepare("INSERT INTO users (FirstName, Name_User, Date_Of_Birth, E_mail, Phone, Passwords, Roles) VALUES (:firstname, :name, :dateN, :email, :numero, :passwords, :role)");
            $prep->bindValue(":firstname", $firstname);
            $prep->bindValue(":name", $name);
            $prep->bindValue(":dateN", $date);
            $prep->bindValue(":email", $email);
            $prep->bindValue(":numero", $numero);
            $prep->bindValue(":passwords", $hash);
            $prep->bindValue(":role", $role);
            $prep->execute();
            echo "Utilisateur ajoutée !<br>";
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
    }
    // Fermer la connexion à la base de données
    $bdd = null;
    $id = $email;
    $nom = $name.' '.$firstname;
    $role = $role;
    require_once('..\session\session.php');
}
?>
