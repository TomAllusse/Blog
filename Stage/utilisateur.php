<?php    
    if(isset($_SESSION['user'])){
        header('Location: user.php');
        exit();
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