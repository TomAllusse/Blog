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
                    $id = $identifiant;
                    $nom = $resultat["Name_User"].' '.$resultat["FirstName"];
                    $role = $resultat["Roles"];
                    $hash = $rsuser["Passwords"];
                    require_once('..\session\session.php');
                }    
            }
            else
            {
                echo "mots de passe invalide !<br>";
            }
        }
        else
        {
            echo "Identifiant invalide !<br>";
        }
        // Fermer la connexion à la base de données
        $bdd = null;
    }
?>
