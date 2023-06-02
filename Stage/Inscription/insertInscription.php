<?php

require_once '..\BDD\connexionBDD.php';

$bdd = connexionBDD();
$OK = false;
if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['identifiant']) && isset($_POST['date']) && isset($_POST['email']) && isset($_POST['numero']) && isset($_POST['password'])) {
    // Récupération des champs saisis
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $username = $_POST['identifiant'];
    $date = $_POST['date'];
    $email = $_POST['email'];
    $numero = $_POST['numero'];
    $password = $_POST['password'];
    $pwd = $_POST['pass'];

    $hash = password_hash($password, PASSWORD_DEFAULT);

    require_once '..\VerificationEmail.php';
    
    if(password_verify($pwd, $hash) == 1 && verifEmail($email) == 1){
        $requete = "INSERT INTO users (FirstName, Name_User, Username, Date_Of_Birth, E_mail, Phone, Passwords, Roles) VALUES (?, ?, ?, ?, ?, ?, ?, 'User')";
        $prep = $bdd->prepare($requete);
        $prep->execute(array($prenom, $nom, $username, $date, $email, $numero, $hash));
    }
    else
    {
        if(password_verify($pwd, $hash) == 0){
            echo "Le mots de passe n'est pas le même";
        }
        if(verifEmail($email) == 0){
            echo "L'email n'est pas valide'";
        }
    }
    // Fermer la connexion à la base de données
    $bdd = null;
    $OK = true; // Variable drapeau indiquant le succès de l'ajout
}
?>
