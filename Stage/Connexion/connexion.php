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
                $rsid= $prep->fetch();

                session_start();
                $_SESSION['user'] = [$identifiant => [$rsuser["Name_User"].' '.$rsuser["FirstName"], $identifiant => $rsuser["Roles"], $identifiant => $rsuser["Passwords"]]];
        
                if ($_SESSION['Role'] == 'ROLE_ADMIN') {
                    header('Location: ..\admin.php');
                }
                else
                {
                    header('Location: ..\index.php');
                }
                exit();
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
