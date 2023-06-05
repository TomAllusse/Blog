<?php
    // Fonction qui effectue la connexion à la BDD
    // Elle renvoie un objet de la classe PDO par le biais de son constructeur
    function connexionBDD() {
        // Connexion à la BD
        $bdd = new PDO("mysql:host=localhost; dbname=Blog;charset=utf8", "root", "");
        return $bdd;
    }
?>