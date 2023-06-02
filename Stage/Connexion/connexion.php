<?php
    require_once('..\BDD\connexionBDD.php');
    $bdd = connexionBDD();

    if (!empty($_POST['identifiant']) && !empty($_POST['password'])) {
        // Récupération des champs saisis
        $identifiant = htmlspecialchars(strip_tags($_POST["identifiant"]));
        $password = htmlspecialchars(strip_tags($_POST["password"]));
        $prep = $bdd->prepare("SELECT * FROM `users` where E_mail=:identifiant");
        $prep->bindValue(":identifiant", $identifiant);
        $prep->execute();
        $rsuser= $prep->fetch();

        if($rsuser){
            $pass = password_verify($password, $rsuser["Passwords"]);
            if($pass){
                $prep = $bdd->prepare("SELECT * FROM `users` where E_mail=:identifiant and Passwords=:passwords");
                $prep->bindValue(":identifiant", $identifiant);
                $prep->bindValue(":passwords", $rsuser["Passwords"]);
                $prep->execute();
                $rsid= $prep->fetchAll();
                foreach($rsid as $resultat){
                    echo "<p>Nom : ".$resultat["Name_User"]." / Prenom : ".$resultat["FirstName"]." / Role : ".$resultat["Roles"].".</p>";
                }    
            }
            else
            {
                echo "mots de passe invalide";
            }
        }
        else
        {
            echo "Identifiant invalide";
        }
        // Fermer la connexion à la base de données
        $bdd = null;
        header('Location: ..\index.php');
    }
?>
