<?php
    class Categories{
        private int $categories_id;
        private string $categories_name;
        
        public function __construct(string $categories_name){
            $this->categories_name = $categories_name;
        }
        
        /*GET*/

        public function getID(){
            return $this->categories_id;
        }
        public function getName(){
            return $this->categories_name;
        }

        /*SET*/

        public function setID(int $new_categories_id){
            $this->categories_id = $new_categories_id;
        }
        public function setName(string $new_categories_name){
            $this->categories_name = $new_categories_name;
        }

        public function DisplayCategories(){
            $bdd = connexionBDD();
            
            $prep = $bdd->prepare("SELECT * FROM `categories`");
            $prep->execute();
            return $prep->fetchall();
        }

        public function InsertCategories(string $name){
            $bdd = connexionBDD();
            
            $prep = $bdd->prepare("INSERT INTO post (Name_Categories) VALUES (:name)");
            $prep->bindValue(":name", $name);
            $prep->execute();
            return $prep->fetchall();
        }

        public function UpdateCategories(string $name){
            $bdd = connexionBDD();
            
            $prep = $bdd->prepare("UPDATE `users` SET `Name_Categories` = :name WHERE `Id_Comment` = :id_categories");
            $prep->bindValue(":id_categories", $this->categories_id);
            $prep->bindValue(":name", $name);
            $this->categories_name = $name;
            $prep->execute();
        }

        public function DeleteCategories($categories_id){
            $bdd = connexionBDD();
            
            $prep = $bdd->prepare("DELETE FROM `categories` WHERE `Id_Categories`=:id");
            $prep->bindValue(":id", $categories_id);
            $prep->execute();
        }
    }
?>