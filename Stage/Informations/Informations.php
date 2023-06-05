<?php
    $repertoireDestination = "uploads/"   ;   
    $NomDuFichier = $_FILES["mon_fichier"]["name"];
    $taille_max    = 5000000;
    $taille_fichier = filesize($_FILES['mon_fichier']['tmp_name']);
    if ($taille_fichier > $taille_max){
      echo "Vous avez dépassé la taille de fichier autorisée";
    }else if ($NomDuFichier !=''){
        if ( is_uploaded_file($_FILES["mon_fichier"]["tmp_name"])) {
          if (file_exists ($repertoireDestination.$NomDuFichier)){
            echo 'Le fichier '.$NomDuFichier.' existe déjà<br/>';
          }else{ 
            if (!rename($_FILES["mon_fichier"]["tmp_name"],
                $repertoireDestination.$NomDuFichier))
            {   
              echo "Le déplacement du fichier temporaire a échoué";
            }
          }    
        } else {
          echo "Le fichier ". $NomDuFichier ." n'a pas été uploadé";
        }
    }

    require_once '..\BDD\connexionBDD.php';
    require_once '..\VerificationEmail.php';

    $bdd = connexionBDD();

    if (!empty($_POST['email']) && !empty($_POST['password'] && !empty($_POST['pass']))) {
        $email = htmlspecialchars(strip_tags($_POST["email"]));
        $password = htmlspecialchars(strip_tags($_POST["password"]));
        $pwd = htmlspecialchars(strip_tags($_POST['pass']));
        $role = "ROLE_USER";

        $hash = password_hash($password, PASSWORD_ARGON2I);

        $prep = $bdd->prepare("SELECT * FROM `users`");
        $prep->execute();
        $rsusers= $prep->fetchall();
        $erreur = 0;

        if($rsusers){
            foreach($rsusers as $rsuser){
                if($rsuser['E_mail'] == $email){
                    $erreur = 1;
                    echo "Cette utilisateur existe déjà !<br>";
                }
            }
        }
        if($erreur == 0){
            if(password_verify($pwd, $hash) == 1 && verifEmail($email) == 1){
                $prep = $bdd->prepare("INSERT INTO users (E_mail, Passwords, Roles) VALUES (:email, :passwords, :role)");
                $prep->bindValue(":email", $email);
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
        }else{
            header('Location: formInscription.php');
        }
        // Fermer la connexion à la base de données
        $bdd = null;
    }
?>
