<?php
    require_once('..\BDD\connexionBDD.php');
    $bdd = connexionBDD();
    $OK = false;
    if (isset($_POST['identifiant']) && isset($_POST['password'])) {
        // Récupération des champs saisis
        $user = $_POST['identifiant'];
        $password = $_POST['password'];
        $req = "SELECT * FROM `users` where E_mail=\"$user\"";
        $prep = $bdd->prepare($req);
        $prep->execute();
        $rsuser= $prep->fetch();

        if($rsuser){
            $pass = password_verify($password, $rsuser["Passwords"]);
            $pwd = $rsuser["Passwords"];
            if($pass){
                echo "ok 2";
                $requete = "SELECT * FROM `users` where E_mail=\"$user\" and Passwords=\"$pwd\"";
                $prep = $bdd->prepare($requete);
                $prep->execute();
                $rsid= $prep->fetchAll();
                foreach($rsid as $resultat+){
                    echo "<p>Nom : $resultat[Name_User] / Prenom : $resultat[FirstName] / Role : $resultat[Roles]";
                }    
            }else{
                var_dump($pass);
                echo "Identifiant ou mots de passe invalide";
            }
        }

        $requete = "SELECT * FROM `users` where E_mail=\"$user\" and Passwords=\"$pass\"";
        $prep = $bdd->prepare($requete);
        $prep->execute();
        $rsid= $prep->fetchAll();
        $nbr=$prep->rowCount();
        // Fermer la connexion à la base de données
        $bdd = null;
        $OK = true; // Variable drapeau indiquant le succès de l'ajout
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>
<body>
    <?php 
        //header('Location: ..\admin.php');

    ?>
</body>
</html>
