<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="layouts/menu.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/compte.css">
    <title>Accueil</title>
</head>
<body>
    <header>
        <nav class="menu">
            <ul>
                <li class="gauche"><img src="images/test.jpg" alt="logo blog"></li>
                <li><a href="index.php">Home</a></li>
                <li><a href="page2.php">Page 2</a></li>
                <li><a href="admin.php">Admin</a></li>
                <li class="compte"><a href="compte.php">Mon compte</a></li>
                <li class="droite"><img src="images/account.png" alt="logo compte"></li>
            </ul> 
        </nav>
    </header>
    <main>
        <!--Registration-->
        <section>
            <div>
                <form method="post" action="contact.php" >
                    <fieldset>
                        <h2>
                            Inscription
                        </h2>
                        <h3>Vos Informations personnelles</h3>
                        <label for="prenom">
                            Prénom :
                        </label>
                        <input type="text" id="prenom" name="prenom" autocomplete="on" placeholder="Ex : Paul" required="required"> <br>
                        <label for="nom">
                            Nom :
                        </label>
                        <input type="text" id="nom" name="nom" autocomplete="on" placeholder="Ex : Germain" required="required"> <br>
                        <label for="date">
                            Date de naissance:
                        </label>
                        <input type="date" id="date" name="date" required="required"> <br>
                        <label for="identifiant">
                            Identifiant :
                        </label>
                        <input type="text" id="identifiant" name="identifiant" autocomplete="on" placeholder="Ex : Germain" required="required"> <br>       
                        <label for="email">
                            Email :
                        </label>
                        <input type="email" id="email" name="email" autocomplete="on" placeholder="Ex : tomgermain@gmail.com" required="required"> <br>
                        <label for="numero">
                            Numéro de téléphone :
                        </label>
                        <input type="text" id="numero" name="numero" placeholder="Ex : +33 6 95 55 45 56"> <br>
                        <label for="password">
                            Mots de passe (8 caractères minimum):
                        </label>
                        <input type="password" id="password" name="password" required="required" minlength="8" size="15"> <br>
                    </fieldset>         
                    <input class="buttonform" type="submit" value="Envoyer" >
                </form>
            </div>
            <!--Login-->
            <div>
                <form method="post" action="login.php" >
                    <fieldset>
                        <h2>
                            Connexion
                        </h2>
                        <label for="login">
                            Identifiant ou Email :
                        </label>
                        <input type="text" id="login" name="id" autocomplete="on" required="required"> <br>
                        <label for="pass">
                            Mots de passe :
                        </label>
                        <input type="password" id="pass" name="pass" autocomplete="on" required="required"> <br>
                    </fieldset>         
                    <input class="buttonform" type="submit" value="Envoyer" >
                </form>
            </div>
        </section>
    </main>
    <footer>
        <small>Copyright &copy; 2023. All Rights Reserved</small>
    </footer>
</body>
</html>