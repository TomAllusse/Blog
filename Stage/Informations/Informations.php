<?php
    /*
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
    }*/

    require_once '../BDD/connexionBDD.php';
    require_once '../VerificationEmail.php';

    $bdd = connexionBDD();
    session_start();

    if (!empty($_POST['prenom']) && !empty($_POST['nom']) && !empty($_POST['date']) && !empty($_POST['numero'])) {
        $prenom = htmlspecialchars(strip_tags($_POST["prenom"]));
        $nom = htmlspecialchars(strip_tags($_POST["nom"]));
        $date = htmlspecialchars(strip_tags($_POST['date']));
        $numero = htmlspecialchars(strip_tags($_POST['numero']));

        $prep = $bdd->prepare("SELECT * FROM `users`");
        $prep->execute();

        $prep = $bdd->prepare("UPDATE `users` SET `FirstName` = :prenom, `Name_User` = :nom, `Date_Of_Birth` = :date, `Phone` = :numero WHERE `E_mail` = :email;");
        $prep->bindValue(":prenom", $prenom);
        $prep->bindValue(":nom", $nom);
        $prep->bindValue(":date", $date);
        $prep->bindValue(":numero", $numero);
        $prep->bindValue(":email", $_SESSION['user']['mail']);
        var_dump($prep);
        $prep->execute();
        
        if(!empty($_POST['email'])){
            $prep = $bdd->prepare("UPDATE `users` SET `E_mail` = :email WHERE `E_mail` = :email;");
            $prep->execute();
        }

        // Fermer la connexion à la base de données
        $bdd = null;
    }
?>
