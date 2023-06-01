<?php
    require_once('..\BDD\connexionBDD.php');
    $bdd = connexionBDD();
    $OK = false;
    if (isset($_POST['identifiant']) && isset($_POST['pass'])) {
        // Récupération des champs saisis
        $user = $_POST['identifiant'];
        $password = $_POST['pass'];
        $req = "SELECT * FROM `user_` where E_mail=\"$user\"";
        $prep = $bdd->prepare($req);
        $prep->execute();
        $rsuser= $prep->fetch();

        if($rsuser){
            $pass = password_verify($password, $rsuser["Password"]);
            $pwd = $rsuser["Password"];
            echo"ok 1";
            if($pass){
                $requete = "SELECT * FROM `user_` where E_mail=\"$user\" and Password=\"$pwd\"";
                $prep = $bdd->prepare($requete);
                $prep->execute();
                $rsid= $prep->fetchAll();
                foreach($rsid as $visuel){
                    echo "ok 2";
                }    
            }
        }

        $requete = "SELECT * FROM `user_` where E_mail=\"$user\" and Password=\"$pass\"";
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