<?php    
    if(isset($_SESSION['user'])){
        $mail = $_SESSION['user']['mail'];
        echo "
            <form id=\"FromInfos\" method=\"post\" action=\"Informations/Informations.php\" enctype=\"multipart/form-data\">
                <h2 id=\"titreInfos\">
                    Remplissez vos informations
                </h2>
                <fieldset>
                    <h3>Vos Informations personnelles (Information déjà remplie :  *)</h3>
                    <label for=\"prenom\"> 
                        Prénom :
                    </label>
                    <input type=\"text\" id=\"prenom\" name=\"prenom\" autocomplete=\"on\" placeholder=\"Ex : Paul\"> <br>
                    <label for=\"nom\">
                        Nom :
                    </label>
                    <input type=\"text\" id=\"nom\" name=\"nom\" autocomplete=\"on\" placeholder=\"Ex : Germain\"> <br> 
                    <label for=\"date\">
                        Date de naissance:
                    </label>
                    <input type=\"date\" id=\"date\" name=\"date\"> <br>
                    <label for=\"email\">
                        Email :
                    </label>
                    <input type=\"email\" id=\"email\" name=\"email\" autocomplete=\"on\" placeholder=\"$mail *\"> <br>
                    <label for=\"numero\">
                        Numéro de téléphone :
                    </label>
                    <input type=\"text\" id=\"numero\" name=\"numero\" placeholder=\"Ex : +33 6 95 55 45 56\"> <br>
                    <label for=\"image_User\">
                        Charger une image (Max 5Mo) :
                    </label>
                    <input type=\"file\" name=\"image_User\" id=\"image_User\"  accept=\".jpg, .jpeg, .png\">
                    <input id=\"buttonform\" type=\"submit\" value=\"Valider\" >
                </fieldset>
            </form>";
    }else{
        echo "
            <form id=\"formCompte\" method=\"post\" action=\"Inscription/formInscription.php\" >
                <fieldset>
                    <h2 class=\"titreForm\">
                        Cliquez sur le bouton pour l'inscription
                    </h2>
                    <input id=\"buttonform\" type=\"submit\" value=\"Inscription\" >
                </fieldset>
            </form>
            <form id=\"formCompte2\" method=\"post\" action=\"Connexion/formConnexion.php\" >
                <fieldset>
                    <h2 class=\"titreForm\">
                        Cliquez sur le bouton pour la connexion
                    </h2>
                    <input id=\"buttonform\" type=\"submit\" value=\"Connexion\" >
                </fieldset>
            </form>";
    }
?>