<?php
    class Comment{
        public function DisplayComment(){
            $bdd = connexionBDD();
            
            $prep = $bdd->prepare("SELECT * FROM `comment`");
            $prep->execute();
            return $prep->fetchall();
        }
    }
?>