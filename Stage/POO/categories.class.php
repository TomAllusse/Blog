<?php
    class categories{
        private int $categories_id;
        private string $categories_name;
        
        public function __construct(string $name){
            $this->categories_name = $name;
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
    }
?>