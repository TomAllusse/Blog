<?php
    require_once('../BDD/connexionBDD.php');
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
                
                $NomPrenom = $rsuser["Name_User"].' '.$rsuser["FirstName"];

                $_SESSION = ['user' => ['mail' => $identifiant, 'name'=> $NomPrenom, 'pwd' => $rsuser["Passwords"], 'role' => $rsuser["Roles"]]];        
                
                if ($_SESSION['user']['role'] == 'ROLE_ADMIN') {
                    header('Location: ../admin.php');
                    exit();
                }
                else
                {
                    header('Location: ../compte.php');
                    exit();
                }
                exit();
            }
            else
            {
                echo "mots de passe invalide !<br>";
                header('Location: formConnexion.php');
            }
        }
        else
        {
            echo "Identifiant invalide !<br>";
            header('Location: formConnexion.php');
            exit();
        }
        // Fermer la connexion à la base de données
        $bdd = null;
    }
?>
