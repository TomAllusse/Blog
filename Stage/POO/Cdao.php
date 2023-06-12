<?php
    class Cdao {
        private $bdd;

        function __construct() {
            $this->bdd = new PDO("mysql:host=localhost; dbname=Blog;charset=utf8", "root", "");
        }
    }
?>