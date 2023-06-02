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
        if($nbr > 0){
            foreach($rsusers as $rsuser){
                if($rsuser['E_mail'] != $email){
                    if(password_verify($pwd, $hash) == 1 && verifEmail($email) == 1){
                        $prep = $bdd->prepare("INSERT INTO users (FirstName, Name_User, Date_Of_Birth, E_mail, Phone, Passwords, Roles) VALUES (:firstname, :name, :dateN, :email, :numero, :passwords, :roles)");
                        $prep->bindValue(":firstname", $firstname);
                        $prep->bindValue(":name", $name);
                        $prep->bindValue(":dateN", $date);
                        $prep->bindValue(":email", $email);
                        $prep->bindValue(":numero", $numero);
                        $prep->bindValue(":passwords", $hash);
                        $prep->bindValue(":roles", $role);
                        $prep->execute();
                        echo "Utilisateur ajoutée !";
                    }
                    else
                    {
                        if(password_verify($pwd, $hash) == 0){
                            echo "Le mots de passe n'est pas le même !";
                        }
                        if(verifEmail($email) == 0){
                            echo "L'email n'est pas valide !";
                        }
                    }
                }
                else
                {
                    echo "Cette utilisateur existe déjà !";
                }
            }
        }
        else
        {
            if(password_verify($pwd, $hash) == 1 && verifEmail($email) == 1){
                $prep = $bdd->prepare("INSERT INTO users (FirstName, Name_User, Date_Of_Birth, E_mail, Phone, Passwords, Roles) VALUES (:firstname, :name, :dateN, :email, :numero, :passwords, :roles)");
                $prep->bindValue(":firstname", $firstname);
                $prep->bindValue(":name", $name);
                $prep->bindValue(":dateN", $date);
                $prep->bindValue(":email", $email);
                $prep->bindValue(":numero", $numero);
                $prep->bindValue(":passwords", $hash);
                $prep->bindValue(":role", $roles);
                $prep->execute();
                echo "Utilisateur ajoutée !";
            }
            else
            {
                if(password_verify($pwd, $hash) == 0){
                    echo "Le mots de passe n'est pas le même !";
                }
                if(verifEmail($email) == 0){
                    echo "L'email n'est pas valide !";
                }
            }
        }
    }
    else
    {
        if(password_verify($pwd, $hash) == 1 && verifEmail($email) == 1){
            $prep = $bdd->prepare("INSERT INTO users (FirstName, Name_User, Date_Of_Birth, E_mail, Phone, Passwords, Roles) VALUES (:firstname, :name, :dateN, :email, :numero, :passwords, :roles)");
            $prep->bindValue(":firstname", $firstname);
            $prep->bindValue(":name", $name);
            $prep->bindValue(":dateN", $date);
            $prep->bindValue(":email", $email);
            $prep->bindValue(":numero", $numero);
            $prep->bindValue(":passwords", $hash);
            $prep->bindValue(":roles", $role);
            $prep->execute();
            echo "Utilisateur ajoutée !";
        }
        else
        {
            if(password_verify($pwd, $hash) == 0){
                echo "Le mots de passe n'est pas le même !";
            }
            if(verifEmail($email) == 0){
                echo "L'email n'est pas valide !";
            }
        }
    }
    // Fermer la connexion à la base de données
    $bdd = null;
    header('Location: ..\index.php');
}
?>
