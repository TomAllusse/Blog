<?php
    session_start();

    require_once 'BDD/connexionBDD.php';

    $bdd = connexionBDD();    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/user.css">
    <link rel="stylesheet" href="css/submit.css">
    <?php
        if(isset($_GET['modif'])){
            echo "<link rel=\"stylesheet\" href=\"css/compte.css\">";
            echo "<link rel=\"stylesheet\" href=\"css/formModif.css\">";
        }
    ?>
    <!--Boostrap CSS-->
    <link href="bootstrap-5.2.2-dist/css/bootstrap.css" rel="stylesheet">
    <!--Bouton-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Accueil</title>
</head>
<body id="corps">
    <?php
        require_once('layouts/nav-bar.php');
    ?>
    <main>
        <?php
        if(isset($_GET['modif'])){
            
            $prep = $bdd->prepare("SELECT * FROM `users` WHERE `E_mail`=:mail");
            $prep->bindValue(":mail", $_SESSION['user']['mail']);
            $prep->execute();
            $user= $prep->fetch();

            $firstname = $user['FirstName'];
            $name = $user['Name_User'];
            $mail = $user['E_mail'];
            $phone = $user['Phone'];

            echo "
                <form id=\"FromInfos\" method=\"post\" action=\"Informations/Informations.php\" enctype=\"multipart/form-data\">
                    <fieldset>
                        <h3>Remplissez vos informations</h3>
                        <label for=\"prenom\"> 
                            Prénom :
                        </label>
                        <input type=\"text\" id=\"prenom\" name=\"prenom\" autocomplete=\"on\" placeholder=\"$firstname\"> <br>
                        <label for=\"nom\">
                            Nom :
                        </label>
                        <input type=\"text\" id=\"nom\" name=\"nom\" autocomplete=\"on\" placeholder=\"$name\"> <br> 
                        <label for=\"date\">
                            Date de naissance:
                        </label>
                        <input type=\"date\" id=\"date\" name=\"date\"> <br>
                        <label for=\"email\">
                            Email :
                        </label>
                        <input type=\"email\" id=\"email\" name=\"email\" autocomplete=\"on\" placeholder=\"$mail\"> <br>
                        <label for=\"numero\">
                            Numéro de téléphone :
                        </label>
                        <input type=\"text\" id=\"numero\" name=\"numero\" placeholder=\"$phone\"> <br>
                        <label for=\"image_User\">
                            Charger une image (Max 5Mo) :
                        </label>
                        <input type=\"file\" name=\"image_User\" id=\"image_User\"  accept=\".jpg, .jpeg, .png\">
                        <button id=\"button\" type=\"submit\">
                            <svg width=\"196px\" height=\"70px\" viewPort=\"0 0 196 70\" version=\"1.1\" xmlns=\"http://www.w3.org/2000/svg\">
                                <text class=\"check\" x=\"96\" y=\"40\" font-family=\"Montserrat\" font-size=\"22\" fill-opacity=\"1\" text-anchor=\"middle\" fill=#181717>
                                    VALIDER
                                </text>
                                <text class=\"checkNode\" x=\"96\" y=\"40\" font-family=\"Montserrat\" font-size=\"22\" fill-opacity=\"1\" text-anchor=\"middle\" fill=#181717>
                                    ✔
                                </text> 
                            </svg>
                        </button>
                    </fieldset>
                </form>";
        }else{

            $prep = $bdd->prepare("SELECT * FROM `users` WHERE `E_mail`=:mail");
            $prep->bindValue(":mail", $_SESSION['user']['mail']);
            $prep->execute();
            $user= $prep->fetch();
            echo '
                <div class="user">
                    <h1>Vos Informations personnelles</h1>
                    <h2>Prénom :</h2>
                    <p>'.$user['FirstName'].'</p>
                    <h2>Nom :</h2>
                    <p>'.$user['Name_User'].'</p>
                    <h2>Date de naissance :</h2>
                    <p>'.$user['Date_Of_Birth'].'</p>
                    <h2>Mail :</h2>
                    <p>'.$user['E_mail'].'</p>
                    <h2>Téléphone :</h2>
                    <p>'.$user['Phone'].'</p>
                </div>
                <div class="imgUser">
                    <h1>Image de profil</h1>
                    <img src='.$user['Picture_User'].' alt="image de l`article">
                </div>
                <div id="button3"> 
                    <a href="user.php?modif=true">
                        MODIFIER MES DONNÉES
                    </a>
                </div>
                <div id="buttonDisplayADD">
                    <a id="buttonADD" href="Article/FormArticle.php">Ajouter un article</a>
                    <a id="buttonDisplay" href="Article/DisplayMyPost.php?id='.$user['Id_User'].'">Afficher mes articles</a>
                </div>';
        }
        ?>
    </main>
    <?php
        require_once('layouts/footer.php');
    ?>
</body>
<script src="js/javascript.js"></script>
</html>