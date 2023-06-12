<?php
    class categories{
        private $categories_id;
        private $categories_name;
        
        public function __construct($name){
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

        public function setID($new_categories_id){
            $this->categories_id = $new_categories_id;
        }
        public function setName($new_categories_name){
            $this->categories_name = $new_categories_name;
        }
    }
?>