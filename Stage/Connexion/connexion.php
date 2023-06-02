<?php
    require_once('..\BDD\connexionBDD.php');
    $bdd = connexionBDD();
    $OK = false;
    if (isset($_POST['identifiant']) && isset($_POST['password'])) {
        // Récupération des champs saisis
        $user = $_POST['identifiant'];
        $password = $_POST['password'];
        $prep = $bdd->prepare("SELECT * FROM `users` where E_mail=:user");
        $prep->bindValue(":user", $user);
        $prep->execute();
        $rsuser= $prep->fetch();

        if($rsuser){
            $pass = password_verify($password, $rsuser["Passwords"]);
            if($pass){
                $prep = $bdd->prepare("SELECT * FROM `users` where E_mail=:user and Passwords=:passwords");
                $prep->bindValue(":user", $user);
                $prep->bindValue(":passwords", $rsuser["Passwords"]);
                $prep->execute();
                $rsid= $prep->fetchAll();
                foreach($rsid as $resultat){
                    echo "<p style=\"padding:1000px\">Nom : ".$resultat["Name_User"]." / Prenom : ".$resultat["FirstName"]." / Role : ".$resultat["Roles"].".</p>";
                }    
            }else{
                echo "Identifiant ou mots de passe invalide";
            }
        }

        /*$prep = $bdd->prepare("SELECT * FROM `users` where E_mail=\"$user\" and Passwords=\"$pass\"");
        $prep->execute();
        $rsid= $prep->fetchAll();
        $nbr=$prep->rowCount();*/
        // Fermer la connexion à la base de données
        $bdd = null;
        $OK = true; // Variable drapeau indiquant le succès de l'ajout
    }
?>
