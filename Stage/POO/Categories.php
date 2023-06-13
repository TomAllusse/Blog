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
    }
?>