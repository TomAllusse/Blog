<?php
    class Categories{
        private int $categories_id;
        private string $categories_name;
        
        public function __construct(int $categories_id, string $categories_name){
            $this->categories_id = $categories_id;
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
            
            $prep = $bdd->prepare("INSERT INTO categories (Name_Categories) VALUES (:name)");
            $prep->bindValue(":name", $name);
            $prep->execute();
            
            $prep = $bdd->prepare("SELECT * FROM `categories` WHERE Name_Categories=:name");
            $prep->bindValue(":name", $name);
            $prep->execute();
            return $prep->fetch();
        }

        public function UpdateCategories(int $categories_id,string $name){
            $bdd = connexionBDD();
            
            $prep = $bdd->prepare("UPDATE `categories` SET `Name_Categories` = :name WHERE `Id_Categories` = :id_categories");
            $prep->bindValue(":id_categories", $categories_id);
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