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

    $pass = password_hash($password, PASSWORD_DEFAULT);

    $requete = "INSERT INTO user_ (FirstName, Name_User, Username, Date_Of_Birth, E_mail, Phone, Password, Role) VALUES (?, ?, ?, ?, ?, ?, ?, 'User')";
    $prep = $bdd->prepare($requete);
    $prep->execute(array($nom, $prenom, $username, $date, $email, $numero, $pass));
    // Fermer la connexion à la base de données
    $bdd = null;
    $OK = true; // Variable drapeau indiquant le succès de l'ajout
}
?>